<?php

namespace Popp\creational\abstract_factory;

abstract class CommsManager
{
    const APPT = 1;
    const TTD = 2;
    const CONTACT = 3;

    abstract public function make($flag_int):Encoder;
    abstract public function getApptEncoder():Encoder;
    abstract public function getTtdEncoder():Encoder;
    abstract public function getContactEncoder():Encoder;

    abstract public function getHeader(): string;

    abstract public function getFooter(): string;
}
