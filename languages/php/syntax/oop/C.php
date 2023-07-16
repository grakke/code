<?php

namespace syntax\oop;

use syntax\oop\B;

class C extends B
{
    public static function who()
    {
        echo __CLASS__;
    }
}
