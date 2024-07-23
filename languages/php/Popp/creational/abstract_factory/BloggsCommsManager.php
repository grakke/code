<?php

namespace Popp\creational\abstract_factory;

include "CommsManager.php";
include "BloggsApptEncoder.php";
include "BloggsTtdEncoder.php";
include "BloggsContactEncoder.php";

class BloggsCommsManager extends CommsManager
{
    public function getHeader(): string
    {
        return "BloggsCal header \n";
    }

    public function make($flag_int): Encoder
    {
        switch ($flag_int) {
            case self::APPT:
                return new BloggsApptEncoder();
            case self::TTD:
                return new BloggsTtdEncoder();
            case self::CONTACT:
                return new BloggsContactEncoder();
        }
    }




    public function getFooter(): string
    {
        return "BloggsCal footer \n";
    }

    public function getApptEncoder(): Encoder
    {
        return new BloggsApptEncoder();
    }

    public function getTtdEncoder(): Encoder
    {
        return new BloggsTtdEncoder();
    }

    public function getContactEncoder(): Encoder
    {
        return new BloggsContactEncoder();
    }
}
