<?php

namespace syntax\process;


/**
 * 多进程基类
 */
class MultiProcess
{
    private $logfile = './';
    private $maxProcess = 3;
    private $cmdBase = '';

    /**
     * 将某个任务推到后台执行
     *
     * @param type $method
     * @param type $queueId
     * @param type $i
     * @param type $max
     *
     * @return int
     */
    public function runToBackground($method, $queueId, $i, $max): int
    {
        // 命令行
        $this->cmdBase = "php php_cli.php Test $method";
        if (!file_exists($this->logfile)) {
            mkdir($this->logfile, "777");
        }
        $logfile = $this->logfile . "$method.log";

        $this->checkProcessLimit();

        $cmd = $this->cmdBase . " --queueId=$queueId";
        echo "启动$i $max: " . $cmd . "  >> {$logfile} &\n";
        // 检查进程是否存在，如果存在，则不执行这个
        $count = $this->checkProcessCount($cmd);
        if ($count == 0) {
            // 启动进程
            exec($cmd . " >> {$logfile} &");
        }

        $this->listen($i, $max);

        return 0;
    }

    public function checkProcessLimit()
    {
        $count = $this->checkProcessCount($this->cmdBase);
        if (($this->maxProcess - $count) <= 0) {
            // 如果没有空闲进程，则等待，直到出现空闲进程
            while (1) {
                echo "进程池已满，等待中...\n";
                sleep(1);
                $count = $this->checkProcessCount($this->cmdBase);
                if (($this->maxProcess - $count) > 0) {
                    break;
                }
            }
        }
    }

    /**
     * 检查某个任务的进程数量
     *
     * @param string $grepParam
     *
     * @return int
     */
    public function checkProcessCount($grepParam)
    {
        $cmd = "ps -ef | grep \"{$grepParam}\" | grep -v grep | wc -l";
        $out = popen($cmd, "r");
        $line = fread($out, 512);
        pclose($out);
        return $line;
    }

    public function listen($i, $max)
    {
        if ($i == $max) {
            // 最后一个进程，启动以后就扥带直到完成
            while (1) {
                sleep(1);
                $count = $this->checkProcessCount($this->cmdBase);
                echo("剩余进程数量：" . trim($count, "\n") . ", 等待中..\n");
                if ($count == 0) {
                    echo "任务全部完成\n\n";
                    break;
                }
            }
        }
    }
}

