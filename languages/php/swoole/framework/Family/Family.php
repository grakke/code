<?php
//path framework/Family/Family.php
namespace Family;

use Family\Core\Config;
use Family\Core\Log;
use Family\Core\Route;
use Family\Coroutine\Context;
use Family\Coroutine\Coroutine;
use Swoole;

class Family
{
    /**
     * @var 根目录
     */
    public static $rootPath;
    /**
     * @var 框架目录
     */
    public static $frameworkPath;
    /**
     * @var 程序目录
     */
    public static $applicationPath;

    final public static function run()
    {
        if (!defined('DS')) {
            define('DS', DIRECTORY_SEPARATOR);
        }
        self::$rootPath = dirname(dirname(__DIR__));
        self::$frameworkPath = self::$rootPath . DS . 'framework';
        self::$applicationPath = self::$rootPath . DS . 'application';

        //先注册自动加载
        \spl_autoload_register(__CLASS__ . '::autoLoader');
        //加载配置
        Config::load();
        //日志初始化
        Log::init();

        $http = new Swoole\Http\Server(Config::get('host'), Config::get('port'));
        $http->set([
            "worker_num" => Config::get('worker_num'),
        ]);

        $http->on('workerStart', function (\swoole_http_server $serv, int $worker_id) {
            if (function_exists('opcache_reset')) {
                //清除opcache 缓存，swoole模式下其实可以关闭opcache
                \opcache_reset();
            }
            try {
                $mysqlConfig = Config::get('mysql');
                if (!empty($mysqlConfig)) {
                    //配置了mysql, 初始化mysql连接池
                    Pool\Mysql::getInstance($mysqlConfig);
                }
            } catch (\Exception $e) {
                //初始化异常，关闭服务
                print_r($e);
                $serv->shutdown();
            } catch (\Throwable $throwable) {
                //初始化异常，关闭服务
                print_r($throwable);
                $serv->shutdown();
            }
        });

        $http->on('request', function ($request, $response) {
            try {
                //初始化根协程ID
                $coId = Coroutine::setBaseId();
                //初始化上下文
                $context = new Context($request, $response);
                //存放容器pool
                Pool\Context::set($context);
                //协程退出，自动清空
                defer(function () use ($coId) {
                    //清空当前pool的上下文，释放资源
                    Pool\Context::clear($coId);
                });

                //自动路由
                $result = Route::dispatch(
                    $request->server['path_info']
                );
                $response->end($result);
            } catch (\Exception $e) { //程序异常
                Log::alert($e->getMessage(), $e->getTrace());
                $response->end($e->getMessage());
            } catch (\Error $e) { //程序错误，如fatal error
                Log::alert($e->getMessage(), $e->getTrace());
                $response->status(500);
            } catch (\Throwable $e) {  //兜底
                Log::alert($e->getMessage(), $e->getTrace());
                $response->status(500);
            }
        });
        $http->start();
    }

    /**
     * @param $class
     *
     * @desc 自动加载类
     */
    final public static function autoLoader($class)
    {
        //定义rootPath
        $rootPath = dirname(dirname(__DIR__));

        //把类转为目录，eg \a\b\c => /a/b/c.php
        $classPath = \str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

        //约定框架类都在framework目录下, 业务类都在application下
        $findPath = [
            $rootPath . DIRECTORY_SEPARATOR . 'framework' . DIRECTORY_SEPARATOR,
            $rootPath . DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR,
        ];

        //遍历目录，查找文件
        foreach ($findPath as $path) {
            //如果找到文件，则require进来
            $realPath = $path . $classPath;
            if (is_file($realPath)) {
                require "{$realPath}";
                return;
            }
        }
    }
}
