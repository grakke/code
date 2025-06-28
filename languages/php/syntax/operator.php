<?php

$name = $_GET['name'] ?? $_POST['name'] ?? 'Deepak';
echo "Hello " . htmlspecialchars($name) . "<br>";

// 整数
echo 1 <=> 1;
echo "<br>";
echo 1 <=> 0;
echo "<br>";
echo 5 <=> 10;
echo "<br>";
//浮点数
echo 1.0 <=> 1.5;
echo "<br>";
echo 1.0 <=> 1.0;
echo "<br>";
echo 0 <=> 1.0;
echo "<br>";
//字符串
echo "a" <=> "a";
echo "<br>";
echo "a" <=> "c";
echo "<br>";
echo "c" <=> "a";
echo "<br>";

echo "\u{0124}";
echo "\u{112}";
echo "\u{13B}";
echo "\u{13B}";
echo "\u{014C}";


# 算术 arithmetic
$a = 31;
$b = 8;

printf("$a + $b =: %d\n", $a + $b);
printf("$a - $b =: %d\n", $a - $b);
printf("$a * $b=:%d\n", $a * $b);
printf("$a / $b=:%d\n", $a / $b);
printf("$a % $b=:%d\n", ($a % $b));

echo 2 ** 3 . PHP_EOL;

## 自增/自减运算符
## 后置：先赋值后运算
$a = 32;
$b = 8;
$c = $a++;
$d = $b--;
printf("a,b,c,d = %d,%d,%d,%d\n", $a, $b, $c, $d);

## 前置：先运算后复制
$a = 32;
$b = 8;
$c = ++$a;
$d = --$b;
printf("a,b,c,d = %d,%d,%d,%d\n", $a, $b, $c, $d);

var_dump(0 + "3+4+5");

$d = add();
$x = $a++ + ++$b;
$y = --$c + $d--;
echo $x . '_' . $y;

$a = 45;
$b = $a;
$b = 56;
echo $a;
echo $b;

preg_match("/[0-9a-zA-Z]*/", "http://www.baidu.com", $match);
var_dump($match);

$a = 1;
$b = 2;
$c = 3;
function add(): int
{
    $d = 4;
    $c += isset($a) ? 0 : $a++;
    if ($c > 3) {
        $d++;
    }
    echo $a;
    return $d;
}

## 逻辑运算符
# 转换为 boolean 时，以下值被认为是 FALSE：
# 布尔值 FALSE 本身
# 整型值 0（零）
# 浮点型值 0.0（零）
# 空字符串，以及字符串 "0"
# 不包括任何元素的数组
# 特殊类型 NULL（包括尚未赋值的变量）
# 从空标记生成的 SimpleXML 对象

// 越靠前优先级越高
echo 0 ?: 1 ?: 2 ?: 3; //1
echo 0 ?: 0 ?: 2 ?: 3; //2
echo 0 ?: 0 ?: 0 ?: 3; //3
echo 0 ?: 4; // 4

$a = 36;
$b = 56;
$c = 67;
echo $a ?? $b ?? $c;


## 比较运算符
var_dump(10 <=> 12);
var_dump(13 <=> 12);
var_dump(12 <=> 12);

# == vs ===: 只比较变量值 除了比较变量值，还会比较变量类型
$c = 32;
$d = 32.0;
var_dump($c == $d);
var_dump($c === $d);

echo $a < $b; # ($a <=> $b) === -1
echo $a <= $b;   # ($a <=> $b) === -1 || ($a <=> $b) === 0
echo $b == $a; #  ($a <=> $b) === 0
echo $a != $b; #($a <=> $b) !== 0
echo $a >= $b;# ($a <=> $b) === 1 || ($a <=> $b) === 0
echo $a > $b;#($a <=> $b) === 1


/**
 *  大小写转换
 **/
echo 'A' | ' ' . PHP_EOL;
echo 'a' & '_' . PHP_EOL;
echo 'a' ^ ' ' . PHP_EOL;
echo 'A' ^ ' ' . PHP_EOL;

// 是否异号
echo (bool)((-1 ^ 2) < 0) . PHP_EOL;
echo ((1 ^ 2) < 0) . PHP_EOL;

// switch variable
$a = 1;
$b = 3;
$a ^= $b;
$b ^= $a;
$a ^= $b;
echo $a . ' ' . PHP_EOL;

echo 8367 & 8192 . PHP_EOL;
echo 8366 & 8192 . PHP_EOL;

const READ = 1;
const WRITE = 2;
const DELETE = 4;
define("UPDATE", 8);

$permission = READ | WRITE; // 赋予权限 加法
$permissions = READ & ~WRITE; // 禁止写权限 反向全量的选法

# 做权限验证
echo 2 & 10; // 输出：2
echo 2 | 10; // 输出结果：10
echo 1 ^ 1; // 输出结果：0
echo 1 ^ 0; // 输出结果：1

//判断权限
if (READ & $permission) {
    echo 'OK';
}

# 异或运算同样的值两次能还原为原理的值
$arr = [6, 8];
$arr[0] = $arr[0] ^ $arr[1];
var_dump($arr); # array(2) { [0]=> int(14) [1]=> int(8) }
$arr[1] = $arr[0] ^ $arr[1];
var_dump($arr); # array(2) { [0]=> int(14) [1]=> int(6) }
$arr[0] = $arr[0] ^ $arr[1];
var_dump($arr); # array(2) { [0]=> int(8) [1]=> int(6) }
