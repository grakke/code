<?php

//  减少if...else...的使用,提前return异常
//　函数里面先处理异常的情况，再执行正常的逻辑
function doSomething($x): bool
{
    if ($x < 4) {
        return false;
    }
    if ($x > 19) {
        return false;
    }

    return true;
}

$num = 12;
if ($num % 2 == 0) {
    echo "$num is even number";
} else {
    echo "$num is odd number";
}

$a = 0;
$b = 0;
if ($a > $b) :
    echo $a." is greater than ".$b;
elseif ($a == $b) : // 注意使用 elseif
    echo $a." equals ".$b;
else :
    echo $a." is neither greater than or equal to ".$b;
endif;


$num = 70;

$num = 70;
switch ($num) {
    case 10:
        echo("number is equals to 10");
        break;
    case 20:
        echo("number is equal to 20");
        break;
    case 30:
        echo("number is equal to 30");
        break;
    default:
        echo("number is not equal to 10, 20 or 30");
}

echo match ($num) {
    10 => ("number is equals to 10"),
    20 => ("number is equal to 20"),
    30 => ("number is equal to 30"),
    default => ("number is not equal to 10, 20 or 30"),
};

for ($i = 0, $j = 0; $i < 5; $i++, $j++) {
    if ($j == 2) {
        $i = 0;
    }
    echo $i . ':hllo' . PHP_EOL;
}

$season = array("summer", "winter", "spring", "autumn");
foreach ($season as $key => $value) {
    echo "Season $key: $value" . PHP_EOL;
}

// 九九乘法表
for ($i = 1; $i < 10; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        printf("%-8s", sprintf("%dx%d=%d", $j, $i, $i * $j));
    }
    echo PHP_EOL;
}

// 遍历正反转换
$arr = range(8, 100, 2);
$count = count($arr);
for ($i = 0; $i < $count; $i++) {
    echo $arr[$i] . ' ';
}
printf("\n");

for ($i = $count - 1; $i >= 0; $i--) {
    echo $arr[$i] . ' ';
}

$n = 1;
while ($n <= 10) {
    echo "$n" . PHP_EOL;
    $n++;
}
$nums = [1, 2, 3, 4, 5];
$end = 0;
while ($nums[$end] == $nums[--$end]) ;

$n = 1;
do {
    echo "$n" . PHP_EOL;
    $n++;
} while ($n <= 10);


goto a;
echo 'Foo';

a:
echo 'Bar'. PHP_EOL;

# 一个语法结构(language constructs), 并不是一个函数, 参数的list并不要求有括号
print 'Hello';
