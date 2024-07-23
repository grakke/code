<?php

namespace DesignPatterns\Creational\Pool;

class Pool
{
    private array $instances = array();
    private $class;

    public function __construct($class)
    {
        $this->class = $class;
    }

    public function get()
    {
        if (count($this->instances) > 0) {
            return array_pop($this->instances);
        }

        return new $this->class();
    }

    public function dispose($instance): void
    {
        $this->instances[] = $instance;
    }
}
