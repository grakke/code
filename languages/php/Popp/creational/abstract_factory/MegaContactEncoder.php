<?php

namespace Popp\creational\abstract_factory;

class MegaContactEncoder implements Encoder
{
    public function encode(): string
    {
        return "Contact data encode in MegaCal format\n";
    }
}
