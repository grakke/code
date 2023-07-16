<?php

namespace Popp\creational\abstract_factory;

include "Encoder.php";

class BloggsApptEncoder implements Encoder
{
    public function encode(): string
    {
        return "Appointment data encode in BloggsCal format\n";
    }
}
