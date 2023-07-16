<?php

namespace syntax\oop;

include 'A.php';

class B extends A
{
    public static function who()
    {
        echo __CLASS__ . "\n";
    }

    public static function foo()
    {
        A::test();
        parent::test();
        self::test();
    }
}
