<?php

namespace Algorithms\leetcode\editor\cn;

//在数组中的两个数字，如果前面一个数字大于后面的数字，则这两个数字组成一个逆序对。输入一个数组，求出这个数组中的逆序对的总数。
//
// 示例 1: 输入: [7,5,6,4] 输出: 5
//
// 限制：
//
// 0 <= 数组长度 <= 50000

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{
    /**
     * @param $nums
     * @return int
     * @deprecated
     */
    public function reversePairs0($nums)
    {
        $len = count($nums);
        $count = 0;

        for ($i = 0; $i < $len - 1; $i++) {
            for ($j = $i + 1; $j < $len; $j++) {
                if ($nums[$i] > $nums[$j]) {
                    $count++;
                }
            }
        }

        return $count;
    }

    /**
     * @param Integer[] $nums
     *
     * @return Integer
     */
    public function reversePairs($nums)
    {
        $len = count($nums);
        if ($len < 2) {
            return 0;
        }
        $copy = $nums;
        return $this->mergeSort($copy, 0, $len - 1, []);
    }

    public function mergeSort($nums, $l, $r, $temp)
    {
        if ($l == $r) {
            return 0;
        }
        $mid = $l + floor(($r - $l) / 2);
        $leftPairs = $this->mergeSort($nums, $l, $mid, $temp);
        $rightPairs = $this->mergeSort($nums, $mid + 1, $r, $temp);
        if ($nums[$mid] <= $nums[$mid + 1]) {
            return $leftPairs + $rightPairs;
        }
        $crossPairs = $this->mergeAndCount($nums, $l, $mid, $r, $temp);

        return $leftPairs + $crossPairs + $rightPairs;
    }

    private function mergeAndCount($nums, $left, $mid, $right, $temp)
    {
        for ($i = $left; $i <= $right; $i++) {
            $temp[$i] = $nums[$i];
        }

        $i = $left;
        $j = $mid + 1;

        $count = 0;
        for ($k = $left; $k <= $right; $k++) {
            if ($i == $mid + 1) {
                $nums[$k] = $temp[$j];
                $j++;
            } elseif ($j == $right + 1) {
                $nums[$k] = $temp[$i];
                $i++;
            } elseif ($temp[$i] <= $temp[$j]) {
                $nums[$k] = $temp[$i];
                $i++;
            } else {
                $nums[$k] = $temp[$j];
                $j++;
                $count += ($mid - $i + 1);
            }
        }
        return $count;
    }
}
//leetcode submit region end(Prohibit modification and deletion)

        echo (new Solution())->reversePairs([7, 5, 6, 4]);
