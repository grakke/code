<?php

namespace Popp\creational\prototype;

class Container
{
    public Contained $contained;

    public function __construct()
    {
        $this->contained = new Contained();
    }

    public function __clone()
    {
        $this->contained =clone $this->contained;
    }
}
