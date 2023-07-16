<?php

namespace my\name;

class MyClass
{
}

function myfunction()
{
    echo "hello \n";
}

const MYCONST = 1;


// 本环境上下文调用
$a = new MyClass;
var_dump($a);

$d = namespace\MYCONST;
echo $d . "\n";
$e = __NAMESPACE__ . '\MYCONST';
echo constant($e) . "\n";
myfunction();

//全局
\my\name\myfunction();
$c = new \my\name\MyClass;
var_dump($c);
