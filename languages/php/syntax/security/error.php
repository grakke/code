<?php

ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_WARNING);

/**
 * 自定义错误处理器
 *
 * @param int $errNo
 * @param string $errStr
 * @param string $errFile
 * @param int $errLine
 */
function myErrorHandler(int $errNo, string $errStr, string $errFile, int $errLine): void
{
    // 该级别错误不报告的话退出
    if (!(error_reporting() & $errNo)) {
        return;
    }
    $logDir = __DIR__ . "/..";
    if (!file_exists($logDir)) {
        mkdir($logDir);
    }
    $logFile = $logDir . DIRECTORY_SEPARATOR . 'err.log';

    logger("%file% %level% %message%", ["level" => "warning", "message" => $errLine + ":" + $errStr, "file" => $errFile]);
    switch ($errNo) {
        case E_ERROR:
            error_log("[致命错误]:[" . date('Y-m-d H:i:s', time()) . "]_[$errNo] $errStr", 3, $logFile);
            break;
        case E_WARNING:
            error_log("[警告]:[" . date('Y-m-d H:i:s', time()) . "]_[$errNo] $errStr", 3, $logFile);
            break;
        case E_NOTICE:
            error_log("[通知]:[" . date('Y-m-d H:i:s', time()) . "]_[$errNo] $errStr", 3, $logFile);
            break;
        default:
            echo "[未知错误类型]:[" . date('Y-m-d H:i:s', time()) . "]_[$errNo] $errStr\n";
            break;
    }
}

set_error_handler("myErrorHandler");
$ctx = stream_context_create(
    array(
        'http' => array(
            'timeout' => 1
        )
    )
);
try {
    $context = file_get_contents('https://bluebird89.com/error', 0., $ctx);
} catch (Error $e) {
    var_dump($e);
}

set_error_handler('handle_normal_error', E_ALL | E_STRICT);
function handle_normal_error($errno, $errstr, $Serrfile, $errline)
{
    switch ($errno) {
        case E_USER_ERROR:
            send_error_to_log_server($errstr);
            break;
        case E_USER_WARNING:
            break;
        default:
    }
    return true;
}

register_shutdown_function('handle_fatal_error');
function handle_fatal_error(): void
{
    $error = error_get_last();
    if (isset($error['type']) && E_ERROR == $error['type']) {
        send_error_to_log_server($msg);
    }
}
