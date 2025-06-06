<?php


namespace Algorithms\Sort;

require 'vendor/autoload.php';

/**
 * Class Bubble
 * 冒泡排序 序列中最大值插到已排序序列的最前面，过程就像冒泡一样
 *
 * @package Algorithms\sort
 */
class Bubble extends AbstractSort
{
    public static function sort($nums): array
    {
        $len = count($nums);
        $count = 0;
        for ($i = 0; $i < $len; $i++) {
            for ($j = 0; $j < $len - $i - 1; $j++) {
                if ($nums[$j] > $nums[$j + 1]) {
                    self::arraySwap($nums, $j, $j + 1);
                    $count++;
                }
            }
        }

        echo $count . PHP_EOL;
        return $nums;
    }

    static function sort1(array $arr): array
    {
        $len = count($arr);
        $count = 0;
        for ($i = 0; $i < $len; $i++) {
            $swapped = false;
            for ($j = 1; $j < $len - $i; $j++) {
                if ($arr[$j - 1] > $arr[$j]) {
                    static::arraySwap($arr, $j - 1, $j);
                    $swapped = true;
                    $count++;
                }
            }

            if (!$swapped) {
                break;
            }
        }

        echo $count . PHP_EOL;
        return $arr;
    }

    static function sort2(array $arr): array
    {
        $len = count($arr);
        $count = 0;
        do {
            $swapped = false;
            for ($j = 1; $j < $len; $j++) {
                if ($arr[$j - 1] > $arr[$j]) {
                    static::arraySwap($arr, $j - 1, $j);
                    $swapped = true;
                    $count++;
                }
            }
        } while ($swapped);

        echo $count . PHP_EOL;
        return $arr;
    }

    static function sort3(array $arr): array
    {
        $len = count($arr);
        $bound = $len - 1;
        $count = 0;

        for ($i = 0; $i < $len; $i++) {
            $swapped = false;
            $newBound = 0;
            for ($j = 0; $j < $bound; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    static::arraySwap($arr, $j, $j + 1);
                    $swapped = true;
                    $count++;
                    $newBound = $j;
                }
            }
            $bound = $newBound;

            if (!$swapped) {
                break;
            }
        }

        echo $count . PHP_EOL;
        return $arr;
    }
}

$arr = [20, 45, 93, 67, 10, 97, 52, 88, 33, 92];

echo implode(",", Bubble::sort($arr)) . PHP_EOL;
echo implode(",", Bubble::sort1($arr)) . PHP_EOL;
echo implode(",", Bubble::sort2($arr)) . PHP_EOL;
echo implode(",", Bubble::sort3($arr));
