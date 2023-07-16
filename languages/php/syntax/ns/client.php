<?php

namespace PHP\syntax\ns;

use Catalog\ClassA as A;
use Catalog\ClassB as B;
use Catalog\ClassC as C;
use my\name\MyClass;
use syntax\ns\Test;
use syntax\ns\testing\Test as SubTest;
use function Catalog\fn_a;
use function Catalog\fn_b;
use function Catalog\fn_c;
use function spl_autoload_register;
use const Catalog\ConstA;
use const Catalog\ConstB;
use const Catalog\ConstC;
use const my\name\MYCONST;

//include 'test1.php';
include_once './../../vendor/autoload.php';

$a = new MyClass;
var_dump($a);

$d = MYCONST;
var_dump($d);

\my\name\myfunction();

Test::print();
SubTest::print();

// 手动加载
spl_autoload_register(function ($className) {
    $path = explode('\\', $className);
    if ($path[0] == 'Ns') {
        $base = __DIR__;
    }
    $filename = $path[count($path) - 1] . '.php';
    $filepath = $base;
    foreach ($path as $key => $val) {
        if ($key == 0 || $key == count($path) - 1) {
            continue;
        }
        $filepath .= DIRECTORY_SEPARATOR . strtolower($val);
    }
    $filepath .= DIRECTORY_SEPARATOR . $filename;
    require_once $filepath;
});

// group-namespace
require('catalog.php');

$a = new A();
echo $a->hello() . "\n";
$b = new B();
echo $b->hello() . "\n";
$c = new C();
echo $c->hello() . "\n";

echo fn_a() . "\n";
echo fn_b() . "\n";
echo fn_c() . "\n";
echo ConstA . "\n";
echo ConstB . "\n";
echo ConstC . "\n";

$underscores = function (string $classname) {
    $path = str_replace('_', DIRECTORY_SEPARATOR, $classname);
    $path = __DIR__ . "/$path";
    if (file_exists("{$path}.php")) {
        require_once("{$path}.php");
    }
};
spl_autoload_register($underscores);
