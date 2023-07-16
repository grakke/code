<?php

# 以 $ 开头 变量名支持字母（支持中文字符，不过尽量使用 ASCII 字符）、数字、下划线，并且不能以数字开头
$foo = 'Bob';
echo $foo . PHP_EOL;
print $foo . PHP_EOL;
printf("%s" . PHP_EOL, $foo);

# 指针赋值 引用传值，多个变量指向同一地址
$bar = &$foo;
$foo = 'Henry';
echo $bar . PHP_EOL;
# 通过指针赋值的变量，重新赋值，会跟原变量脱离
$bar = "Sam";
echo $foo . PHP_EOL;

## 可变变量
$greeting = "你好";
$varName = "greeting";
echo $$varName . PHP_EOL;
