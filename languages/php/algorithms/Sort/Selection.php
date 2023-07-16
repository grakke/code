<?php


namespace Algorithms\Sort;

require '../../vendor/autoload.php';

class Selection extends AbstractSort
{
    public static function sort(array $nums)
    {
        $iMax = count($nums);

        for ($i = 0; $i < $iMax; $i++) {
            $min = $i;
            for ($j = $i + 1; $j < $iMax; $j++) {
                if ($nums[$j] < $nums[$min]) {
                    $min = $j;
                }
            }

            if ($min != $i) {
                static::arraySwap($nums, $i, $min);
            }
        }

        return $nums;
    }
}

$arr = [20, 45, 93, 67, 10, 97, 52, 88, 33, 92];

echo implode(",", Selection::sort($arr));
