<?php

// 使用递归，会产生额外的开销 O(2^n)
function fibonacci(int $n): int
{
    if ($n == 1 || $n == 2) {
        return 1;
    }

    return fibonacci($n - 1) + fibonacci($n - 2);
}

echo fibonacci(10) .PHP_EOL;

//自顶向下的备忘录法 O(n)
function fibonacciByMemo($n)
{
    if ($n <= 0) {
        return $n;
    }
    $memo = [];
    for ($i = 0; $i <= $n; $i++) {
        $memo[$i] = -1;
    }

    return fib($n, $memo);
}

function fib($n, &$memo)
{
    if ($memo[$n] != -1) {
        return $memo[$n];
    }

    if ($n <= 2) {
        $memo[$n] = 1;
    } else {
        $memo[$n] = fib($n - 1, $memo) + fib($n - 2, $memo);
    }

    return $memo[$n];
}

echo fibonacciByMemo(10).PHP_EOL;

// 迭代：自底向上的动态规划
function fib2($n)
{
    if ($n <= 0) {
        return $n;
    }
    $sum = 0;
    $prev = 1;
    $curr = 1;
    for ($i = 3; $i <= $n; $i++) {
        $sum = $curr + $prev;
        $prev = $curr;
        $curr = $sum;
    }

    return $sum;
}

echo fib2(10).PHP_EOL;
