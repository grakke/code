<?php

namespace Popp\creational\factory;

include "ApptEncoder.php";

class BloggsApptEncoder extends ApptEncoder
{
    public function encode(): string
    {
        return "Appointment data encode in BloggsCal format\n";
    }
}
