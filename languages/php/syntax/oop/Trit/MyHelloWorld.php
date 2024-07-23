<?php

namespace syntax\oop\Trit;

class MyHelloWorld extends Base
{
    use SayWorld;
    use SayHello;
}

$o = new MyHelloWorld();
$o->sayHi();
$o->sayHello();
$o->SayWorld();
