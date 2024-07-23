<?php

namespace syntax\oop;

include "Car.php";

class Benz extends Car
{
    public function getLine()
    {
        echo __LINE__ . PHP_EOL;
    }

    public function drive()
    {
        print 'Benz is driving';
    }
}
