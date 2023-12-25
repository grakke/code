<?php


namespace Algorithms\Sort;

require '../../vendor/autoload.php';

class Insertion extends AbstractSort
{
    public static function sort(array $arr): array
    {
        $len = count($arr);

        // 未排序区遍历
        for ($unsortedIndex = 1; $unsortedIndex < $len; $unsortedIndex++) {
            $current = $arr[$unsortedIndex];
            $lastSortedIndex = $unsortedIndex - 1;
            // 从已排序区尾部开始，插入合适位置
            while ($lastSortedIndex >= 0 && $arr[$lastSortedIndex] > $current) {
                // 只要大于 不断右移
                $arr[$lastSortedIndex + 1] = $arr[$lastSortedIndex];
                $lastSortedIndex--;
            }
            $arr[$lastSortedIndex + 1] = $current;
        }

        return $arr;
    }
}

$arr = [20, 45, 93, 67, 10, 97, 52, 88, 33, 92];

echo implode(",", Insertion::sort($arr));
