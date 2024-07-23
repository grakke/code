<?php

namespace DesignPatterns\Creational\AbstractFactory;

abstract class Picture implements MediaInterface
{
    protected string $path;
    protected string $name;

    public function __construct(string $path, string $name = '')
    {
        $this->name = (string)$name;
        $this->path = (string)$path;
    }
}
