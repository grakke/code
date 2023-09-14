<?php

/*
 * @lc app=leetcode id=35 lang=php
 *
 * [35] Search Insert Position
 */

// @lc code=start
class Solution
{
    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer
     */
    public function searchInsert($nums, $target)
    {
        $begin = 0;
        $end = count($nums) - 1;

        while ($begin <= $end) {
            $mid = $begin + floor(($end - $begin) / 2) ;

            if($nums[$mid] == $target) {
                return $mid;
            } elseif ($nums[$mid] > $target) {
                $end = $mid - 1;
            } else {
                $begin = $mid + 1;
            }
        }

        return $begin;
    }
}
// @lc code=end
