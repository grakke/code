<?php

namespace Popp\behavior\strategy;

abstract class Maker
{
    protected $test;

    public function __construct($test)
    {
        $this->test = $test;
    }

    abstract public function mark($response);
}
