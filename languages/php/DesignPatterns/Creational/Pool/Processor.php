<?php

namespace DesignPatterns\Creational\Pool;

class Processor
{
    private Pool $pool;
    private int $processing = 0;
    private int $maxProcesses = 3;
    private array $waitingQueue = [];

    public function __construct(Pool $pool)
    {
        $this->pool = $pool;
    }

    public function process($image): void
    {
        if ($this->processing++ < $this->maxProcesses) {
            $this->createWorker($image);
        } else {
            $this->pushToWaitingQueue($image);
        }
    }

    private function createWorker($image): void
    {
        $worker = $this->pool->get();
        $worker->run($image, array($this, 'processDone'));
    }

    public function processDone($worker): void
    {
        $this->processing--;
        $this->pool->dispose($worker);

        if (count($this->waitingQueue) > 0) {
            $this->createWorker($this->popFromWaitingQueue());
        }
    }

    private function pushToWaitingQueue($image): void
    {
        $this->waitingQueue[] = $image;
    }

    private function popFromWaitingQueue()
    {
        return array_pop($this->waitingQueue);
    }
}
