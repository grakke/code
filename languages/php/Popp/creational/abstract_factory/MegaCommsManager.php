<?php

namespace Popp\creational\abstract_factory;

include "MegaApptEncoder.php";
include "MegaTtdEncoder.php";
include "MegaContactEncoder.php";

class MegaCommsManager extends CommsManager
{
    public function getHeader(): string
    {
        return "MegaCal header\n";
    }

    public function make($flag_int): Encoder
    {
        switch ($flag_int) {
            case self::APPT:
                return new MegaApptEncoder();
            case self::TTD:
                return new MegaTtdEncoder();
            case self::CONTACT:
                return new MegaContactEncoder();
        }
    }

    public function getFooter(): string
    {
        return "MegaCal footer\n";
    }

    public function getApptEncoder(): Encoder
    {
        return new MegaApptEncoder();
    }

    public function getTtdEncoder(): Encoder
    {
        return new MegaTtdEncoder();
    }

    public function getContactEncoder(): Encoder
    {
        return new MegaContactEncoder();
    }
}
