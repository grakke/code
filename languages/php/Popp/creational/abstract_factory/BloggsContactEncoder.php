<?php

namespace Popp\creational\abstract_factory;

class BloggsContactEncoder implements Encoder
{
    public function encode(): string
    {
        return "Contact data encode in BloggsCal format\n";
    }
}
