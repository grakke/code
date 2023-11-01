<?php declare(strict_types=1);

namespace App\Aspect;

use Swoft\Aop\Annotation\Mapping\Aspect;
use Swoft\Aop\Annotation\Mapping\Before;
use Swoft\Aop\Annotation\Mapping\PointBean;
use Swoft\Aop\Annotation\Mapping\After;
use Swoft\Aop\Annotation\Mapping\AfterReturning;
use Swoft\Aop\Annotation\Mapping\AfterThrowing;
use Swoft\Aop\Annotation\Mapping\Around;
use Swoft\Aop\Point\JoinPoint;
use Swoft\Aop\Point\ProceedingJoinPoint;


/**
 * AOP切面类
 *
 * @since 2.0
 *
 * 声明切面类
 * @Aspect(order=1)
 *
 * 使用注解定义切入点
 * @PointBean(include={"App\Http\Controller\TestExecTimeController"})
 */
class CalcExecTimeAspect
{
    protected $start;

    /**
     * 定义通知链接点
     * @Before()
     */
    public function before()
    {
        //TODO::这里做具体的通知（Advice）
        $this->start = microtime(true);
    }

    /**
     * @After()
     * @param JoinPoint $joinPoint
     */
    public function after(JoinPoint $joinPoint)
    {
        $method = $joinPoint->getMethod();
        $after = microtime(true);
        $runtime = ($after - $this->start) * 1000;

        echo "{$method} 方法，本次执行时间为: {$runtime}ms\n";
    }

    /**
     * @param JoinPoint $joinPoint
     * 定义通知链接点
     * @AfterReturning()
     * @return mixed
     */
    public function afterReturn(JoinPoint $joinPoint)
    {
        $ret = $joinPoint->getReturn();

        // After return

        return $ret;
    }

    /**
     * @Around()
     *
     * @param ProceedingJoinPoint $proceedingJoinPoint
     *
     * @return mixed
     */
    public function around(ProceedingJoinPoint $proceedingJoinPoint)
    {
        // Before around
        $result = $proceedingJoinPoint->proceed();
        // After around

        return $result;
    }

    /**
     * @param \Throwable $throwable
     * 定义通知链接点
     * @AfterThrowing()
     */
    public function afterThrowing(\Throwable $throwable)
    {
        // afterThrowing
    }
}

// curl http://localhost:18306/testExecTime/test/10
// curl http://localhost:18306/testExecTime/sumAndSleep
