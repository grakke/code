<?php

namespace syntax\oop;

include "BaseChild.php";

class Child extends BaseChild
{
    public function __construct()
    {
        echo "Child constructor!", PHP_EOL;
    }

    public function selfFoo()
    {
        return self::foo();
    }

    public function foo()
    {
        echo "Child Foo!", PHP_EOL;
    }
}
