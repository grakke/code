<?php

namespace Src;

class Greeter
{

    public function __construct()
    {
    }

    public function greet(string $name): string
    {
        return 'Hello, ' . $name . '!';
    }
}
