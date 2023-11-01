<?php declare(strict_types=1);

namespace App\Process;

use Swoft\Bean\Annotation\Mapping\Bean;
use Swoft\Event\Annotation\Mapping\Listener;
use Swoole\Process;

/**
 * Class MyProcess
 * @Bean()
 */
class MyProcess
{
    public function create(): Process
    {
        $process = new Process([$this, 'handle']);

        return $process;
    }

    public function handle(Process $process)
    {
        CLog::info('my-process started');

        // 用户进程实现了广播功能，循环接收管道消息，并发给服务器的所有连接
        while (true) {
            $msg = $process->read();
            foreach($server->connections as $conn) {
                $server->send($conn, $msg);
            }
        }
    }
}
