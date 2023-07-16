<?php

namespace syntax\oop;

class A
{
    public static function who()
    {
        echo __CLASS__ . "\n";
    }

    public static function test()
    {
        self::who();
        static::who();
    }

    public static function create(): A
    {
        return new static();
    }


    public function getClassName()
    {
        return static::class;
    }
}
