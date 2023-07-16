<?php

namespace syntax\oop\Trit;

trait HelloWorld
{
    use Hello;
    use SayWorld;
}

$o = new MyHelloWorld();
$o->sayHello();
$o->sayWorld();
