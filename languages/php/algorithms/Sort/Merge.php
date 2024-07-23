<?php

namespace Algorithms\Sort;

require '../../vendor/autoload.php';

class Merge extends AbstractSort
{
    public static function sort(array $arr): array
    {
        $len = count($arr);
        if ($len <= 1) {
            return $arr;
        }

        $mid = $len >> 1;
        $left = static::sort(array_slice($arr, 0, $mid));
        $right = static::sort(array_slice($arr, $mid));

        if (end($left) <= $right[0]) {
            return array_merge($left, $right);
        }
        for ($i = 0, $j = 0, $k = 0; $k <= $len - 1; $k++) {
            if ($i >= $mid && $j < $len - $mid) {
                $arr[$k] = $right[$j++];
            } elseif ($j >= $len - $mid && $i < $mid) {
                $arr[$k] = $left[$i++];
            } elseif ($left[$i] <= $right[$j]) {
                $arr[$k] = $left[$i++];
            } else {
                $arr[$k] = $right[$j++];
            }
        }

        return $arr;
    }

    public static function mergeSort(array $arr): array
    {
        $len = count($arr);
        if ($len == 1) {
            return $arr;
        }

        $mid = (int)$len / 2;
        $left = self::mergeSort(array_slice($arr, 0, $mid));
        $right = self::mergeSort(array_slice($arr, $mid));

        return self::merge1($left, $right);
    }

    public static function merge1(array $left, array $right): array
    {
        $combined = [];
        $countLeft = count($left);
        $countRight = count($right);
        $leftIndex = $rightIndex = 0;

        if (end($left) <= $right[0]) {
            return array_merge($left, $right);
        }

        while ($leftIndex < $countLeft && $rightIndex < $countRight) {
            if ($left[$leftIndex] > $right[$rightIndex]) {
                $combined[] = $right[$rightIndex];
                $rightIndex++;
            } else {
                $combined[] = $left[$leftIndex];
                $leftIndex++;
            }
        }
        while ($leftIndex < $countLeft) {
            $combined[] = $left[$leftIndex];
            $leftIndex++;
        }
        while ($rightIndex < $countRight) {
            $combined[] = $right[$rightIndex];
            $rightIndex++;
        }

        return $combined;
    }

    public static function merge_sort($nums)
    {
        if (count($nums) <= 1) {
            return $nums;
        }

        static::merge_sort_c($nums, 0, count($nums) - 1);

        return $nums;
    }

    // 递归
    private static function merge_sort_c(&$nums, $p, $r): void
    {
        if ($p >= $r) {
            return;
        }

        $q = floor(($p + $r) / 2);
        static::merge_sort_c($nums, $p, $q);
        static::merge_sort_c($nums, $q + 1, $r);

        static::merge($nums, ['start' => $p, 'end' => $q], ['start' => $q + 1, 'end' => $r]);
    }

    public static function merge(&$nums, $nums_p, $nums_q)
    {
        $temp = [];
        $i = $nums_p['start'];
        $j = $nums_q['start'];
        $k = 0;
        while ($i <= $nums_p['end'] && $j <= $nums_q['end']) {
            if ($nums[$i] <= $nums[$j]) {
                $temp[$k++] = $nums[$i++];
            } else {
                $temp[$k++] = $nums[$j++];
            }
        }

        if ($i <= $nums_p['end']) {
            for (; $i <= $nums_p['end']; $i++) {
                $temp[$k++] = $nums[$i];
            }
        }

        if ($j <= $nums_q['end']) {
            for (; $j <= $nums_q['end']; $j++) {
                $temp[$k++] = $nums[$j];
            }
        }

        for ($x = 0; $x < $k; $x++) {
            $nums[$nums_p['start'] + $x] = $temp[$x];
        }
    }
}

$arr = [20, 45, 93, 67, 10, 97, 52, 88, 33, 92];

echo implode(",", Merge::sort($arr)) . PHP_EOL;
echo implode(",", Merge::mergeSort($arr)) . PHP_EOL;
echo implode(",", Merge::merge_sort($arr)) . PHP_EOL;
