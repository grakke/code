<?php

namespace Popp\creational\factory;

include "MegaApptEncoder.php";

class MegaCommsManager extends CommsManager
{
    public function getApptEncoder(): ApptEncoder
    {
        return new MegaApptEncoder();
    }

    public function getHeader(): string
    {
        return "MegaCal header\n";
    }

    public function getFooter(): string
    {
        return "MegaCal footer\n";
    }
}
