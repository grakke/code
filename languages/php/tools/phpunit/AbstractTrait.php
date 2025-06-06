<?php

namespace Tools\phpunit;

trait AbstractTrait
{
    public function concreteMethod()
    {
        return $this->abstractMethod();
    }

    abstract public function abstractMethod();
}
