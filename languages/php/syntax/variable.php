<?php

# 以 $ 开头 变量名支持字母（支持中文字符，不过尽量使用 ASCII 字符）、数字、下划线，并且不能以数字开头
$foo = 'Bob';

# 传值
$bar = $foo;
$bar = 'Henry';
print $foo . PHP_EOL;
printf("%s" . PHP_EOL, $bar);

# 引用赋值 引用传值，多个变量指向同一地址
$bar = &$foo;
$bar = "Sam";
echo $foo . PHP_EOL;

## 可变变量
$greeting = "你好";
$varName = "greeting";
echo $$varName . PHP_EOL;

$arr = [1, 2, 3];
$new_arr = $arr;
$new_arr[1] = 22;
print($arr[1] . " " . $new_arr[1]);
