<?php

namespace syntax\oop;

abstract class Car
{
    protected $brand;
    public static $WHEELS = 4;


    /**
     * Car constructor.
     *
     * @param $brand
     */
    public function __construct($brand)
    {
        $this->brand = $brand;
    }

    abstract public function drive();

    public static function getWheels()
    {
        return self::$WHEELS;
    }

    public static function getClass()
    {
        echo static::class . PHP_EOL;
    }

//    public static function test()
//    {
//        # 后期静态绑定
//        self::getLine();
//        static::getLine();
//    }

    public function getLine()
    {
        echo __LINE__ . PHP_EOL;
    }
}
