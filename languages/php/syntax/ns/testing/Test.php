<?php

namespace syntax\ns\testing;

use  syntax\ns\Test as BaseTest;

class Test extends BaseTest
{
    public static function print():void
    {
        printf("This is from son class print result %s".PHP_EOL, __CLASS__);
    }
}
