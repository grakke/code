<?php

namespace Popp\creational\factory;

class MegaApptEncoder extends ApptEncoder
{
    public function encode(): string
    {
        return "Appointment data encode in MegaCal format\n";
    }
}
