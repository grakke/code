<?php

namespace Popp\creational\abstract_factory;

class BloggsTtdEncoder implements Encoder
{
    public function encode(): string
    {
        return "Ttd data encode in BloggsCal format\n";
    }
}
