<?php
/*
 * @lc app=leetcode id=349 lang=php
 *
 * [349] Intersection of Two Arrays
 */

// @lc code=start
class Solution
{
    /**
     * @param Integer[] $nums1
     * @param Integer[] $nums2
     * @return Integer[]
     */
    public function intersection1($nums1, $nums2)
    {
        $res = [];
        $nums1 = array_unique($nums1);
        $nums2 = array_unique($nums2);

        foreach($nums2 as $num2) {
            if(in_array($num2, $nums1)) {
                $res[] = $num2;
            }
        }

        return $res;
    }

    public function intersection($nums1, $nums2)
    {
        $res = [];
        $nums1 = array_unique($nums1);
        sort($nums2);

        foreach ($nums1 as $num1) {
            if (self::binarySearch($nums2, $num1)) {
                $res[] = $num1;
            }
        }

        return $res;
    }

    public function binarySearch($nums, $target)
    {
        $low = 0;
        $high = count($nums) - 1;

        while ($low <= $high) {
            $mid = $low + floor(($high - $low) / 2);
            if ($nums[$mid] == $target) {
                return true;
            }
            if ($nums[$mid] > $target) {
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }
        }

        return false;
    }
}
// @lc code=end
