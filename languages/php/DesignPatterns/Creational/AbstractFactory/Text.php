<?php

namespace DesignPatterns\Creational\AbstractFactory;

abstract class Text implements MediaInterface
{
    protected string $text;

    public function __construct(string $text)
    {
        $this->text = (string)$text;
    }
}
