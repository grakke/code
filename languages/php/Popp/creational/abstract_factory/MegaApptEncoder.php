<?php

namespace Popp\creational\abstract_factory;

use Popp\creational\abstract_factory\Encoder;

class MegaApptEncoder implements Encoder
{
    public function encode(): string
    {
        return "Appointment data encode in MegaCal format\n";
    }
}
