<?php

/*
 * k种面值的硬币，面值分别为c1, c2 ... ck，每种硬币的数量无限，再给一个总金额amount，问最少需要几枚硬币凑出这个金额，如果不可能凑出，算法返回 -1 。
 */

$coins = [1, 2, 5];
function coinChange($coins, $amount)
{
    $count = 0;
    $rest = $amount;

    for ($i = count($coins) - 1; $rest > 0; $i--) {
        for ($j = 1; $rest >= $coins[$i]; $j++) {
            $rest = $rest - $coins[$i];
            $count++;
            echo $coins[$i]."-";
        }
    }

    return $count;
}

echo coinChange($coins, 13).PHP_EOL;

function coinChange1($coins, $amount)
{
    return dp($coins, $amount);
}

function dp($coins, &$amount)
{
    foreach ($coins as $coin) {
        $amount -= $coin;
        $amount = min($amount, 1 + dp($coins, $amount));
    }
    return $amount;
}

echo coinChange1($coins, 11).PHP_EOL;

/*
 * k种面值的硬币，面值分别为c1, c2 ... ck，每种硬币的数量无限，再给一个总金额amount，问有多少钟换法，如果不可能凑出，算法返回 -1 。
 */
function maxCoinChange($coins, $amount)
{
    $count = 0;
    $rest = $amount;

    for ($i = count($coins) - 1; $rest > 0; $i--) {
        for ($j = 1; $rest >= $coins[$i]; $j++) {
            $rest = $rest - $coins[$i];
            if ($rest == 0) {
                $count++;
            }
            echo $coins[$i]."-";
        }
    }

    return $count;
}

echo maxCoinChange($coins,11);
