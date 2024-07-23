<?php

$multiProcess = new MultiProcess();
$queue = new QueueModel();

$i = 0;
$max = 0;
while (true) {
    list($max, $queueId) = $queue->popFromQueue();
    if ($queueId == $queue::QUEUE_EMPTY) {
        $max = $i = 0;
        list($max, $queueId) = $queue->popFromQueue(true);
    }
    if ($queueId == $queue::LIST_EMPTY) {
        $max = $i = 0;
        echo "\n队列处于空闲状态...\n";
        sleep(3);//队列出于空闲状态
    }
    if ($queueId != $queue::LIST_EMPTY && $queueId != $queue::QUEUE_EMPTY) {
        $multiProcess->runToBackground('updateUserStatus', $queueId, $i, $max);
        $i++;
    }
}

/**
 * 队列
 */
class QueueModel
{
    private $key = 'queue';
    private $_redis;
    public const QUEUE_EMPTY = 'queue_empty';//redis 队列为空
    public const LIST_EMPTY = 'list_empty';//mysql 列表为空

    public function __construct()
    {
        $this->getRedis();
    }

    /**
     * 从队列中获取一条数据
     * 从数据库中将队列取出，并且放到redis队列中。如果redis为空则查询数据库
     *
     */
    public function popFromQueue($readFromDB = false)
    {
        $this->setKey('user');
        if ($readFromDB == false) {
            $length = $this->_redis->llen($this->key);
            if ($length > 0) {
                return array($length, $this->_redis->lpop($this->key));
            } else {
                return array(0, self::QUEUE_EMPTY);
            }
        } else {
            $lists = $this->getAllFromDB();
            if (empty($lists)) {
                return array(0, self::LIST_EMPTY);
            }
            $this->pushQueue($lists);
            return array(count($lists), $this->_redis->lpop($this->key));
        }
    }

    public function getAllFromDB()
    {
        //方便测试，随机返回数据或空
        $a = rand(1, 10) % 2;
        if ($a == 1) {
            return array(1001, 1002, 1003, 1004, 1005, 1006, 1007, 1008);
        } else {
            return array();
        }
    }

    private function getRedis()
    {
        if ($this->_redis) {
            return true;
        } else {
            $redis = new Redis();
            $redis->connect('192.168.23.250', 6379);
            $this->_redis = $redis;
        }
    }

    private function pushQueue($lists)
    {
        foreach ($lists as $id) {
            $this->_redis->rpush($this->key, $id);
        }
    }

    private function setKey($key)
    {
        return $this->key = 'queue:' . $key;
    }
}

