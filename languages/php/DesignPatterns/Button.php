<?php

namespace DesignPatterns;

class Button
{
    private array $listeners;

    public function __construct()
    {
        $this->listeners = [];
    }

    public function addListener(ButtonListener $listener):void {
            $this->listeners[] = $listener;
    }

    public function press()
    {
        foreach ($this->listeners as $listener) {
            $listener->buttonPressed();
        }
    }
}
