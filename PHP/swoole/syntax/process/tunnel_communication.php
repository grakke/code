<?php

// 只需要通过 read/write 从管道读取数据就好
// 无论是从主进程发送数据到子进程，还是从子进程发送数据到主进程都是 OK 的，在通过管道进行进程间通信时，需要注意，数据只能单向流动，即通过管道发送的数据只能由另一个进程读取，自己不能读取
// 管道通信默认为同步阻塞模式，如果要实现异步通信，需要借助 swoole_event_add 函数将管道加入事件循环
// 管道通信:通过 read/write 从管道读取数据就好
$process = new swoole_process(function (\Swoole\Process $worker) {
    // 子进程逻辑
    // 通过管道从主进程读取数据
    $cmd = $worker->read();
    ob_start();
    // 执行外部程序并显示未经处理的原始输出，会直接打印输出
    passthru($cmd);
    $ret = ob_get_clean() ?: ' ';
    $ret = trim($ret).". worker pid:".$worker->pid."\n";
    // 将数据写入管道
    $worker->write($ret);
    $worker->exit(0);  // 退出子进程
});  // Process 构造函数第三个参数默认为 true，启用管道，如果第二个参数也设置为 true，则在子进程中可以通过 echo 将数据写入管道

// 启动进程
$process->start();
// 从主进程将通过管道发送数据到子进程
$process->write('php --version');
// 从子进程读取返回数据并打印
$msg = $process->read();
echo 'result from worker: '.$msg;