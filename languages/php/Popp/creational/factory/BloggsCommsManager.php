<?php

namespace Popp\creational\factory;

include "CommsManager.php";
include "BloggsApptEncoder.php";

class BloggsCommsManager extends CommsManager
{
    public function getApptEncoder(): ApptEncoder
    {
        return new BloggsApptEncoder();
    }

    public function getHeader(): string
    {
        return "BloggsCal header \n";
    }

    public function getFooter(): string
    {
        return "BloggsCal footer \n";
    }
}
