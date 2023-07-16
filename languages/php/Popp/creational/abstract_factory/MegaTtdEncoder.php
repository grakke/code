<?php

namespace Popp\creational\abstract_factory;

class MegaTtdEncoder implements Encoder
{
    public function encode(): string
    {
        return "Ttd data encode in MegaCal format\n";
    }
}
