<?php

namespace Tools\phpunit;

class Subject
{
    protected array $observers = [];
    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function attach(Observer $observer): void
    {
        $this->observers[] = $observer;
    }

    public function doSomething(): void
    {
        // 随便做点什么。
        // ...

        // 通知观察者我们做了点什么。
        $this->notify('something');
    }

    protected function notify($argument): void
    {
        foreach ($this->observers as $observer) {
            $observer->update($argument);
        }
    }

    public function doSomethingBad(): void
    {
        foreach ($this->observers as $observer) {
            $observer->reportError(42, 'Something bad happened', $this);
        }
    }
}
