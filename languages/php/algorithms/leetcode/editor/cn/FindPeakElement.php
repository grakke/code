<?php

namespace Algorithms\leetcode\editor\cn;

//峰值元素是指其值大于左右相邻值的元素。
//
// 给你一个输入数组 nums，找到峰值元素并返回其索引。数组可能包含多个峰值，在这种情况下，返回任何一个峰值 所在位置即可。
//
// 你可以假设 nums[-1] = nums[n] = -∞ 。
//
//
//
// 示例 1：
//
//
//输入：nums = [1,2,3,1]
//输出：2
//解释：3 是峰值元素，你的函数应该返回其索引 2。
//
// 示例 2：
//
//
//输入：nums = [1,2,1,3,5,6,4]
//输出：1 或 5
//解释：你的函数可以返回索引 1，其峰值元素为 2；
//     或者返回索引 5， 其峰值元素为 6。
//
//
//
//
// 提示：
//
//
// 1 <= nums.length <= 1000
// -231 <= nums[i] <= 231 - 1
// 对于所有有效的 i 都有 nums[i] != nums[i + 1]
// 只要数组中存在一个元素比相邻元素大，那么沿着它一定可以找到一个峰值
//
//
//
// 进阶：你可以实现时间复杂度为 O(logN) 的解决方案吗？
// Related Topics 数组 二分查找
// 👍 440 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * 边界为无穷小，只要有递增就行
     * @param  Integer[]  $nums
     *
     * @return Integer
     */
    public function findPeakElement($nums)
    {
        $count = count($nums);

//        $nums[-1] = $nums[$count] = in
        if ($count == 1) {
            return 0;
        }

        $low = 0;
        $high = $count - 1;
        while ($low <= $high) {
            $mid = $low + floor(($high - $low) / 2);

            if ($mid == 0) {
                if ($nums[$mid] > $nums[$mid + 1]) {
                    return $mid;
                } else {
                    $low = $mid + 1;
                }
            } elseif ($mid == ($count - 1)) {
                if ($nums[$mid] > $nums[$mid - 1]) {
                    return $mid;
                } else {
                    $high = $mid - 1;
                }
//                终止条件
            } elseif (($nums[$mid] > $nums[$mid - 1]) && ($nums[$mid] > $nums[$mid + 1])) {
                return $mid;
            } elseif ($nums[$mid] > $nums[$mid + 1]) {
                $high = $mid - 1;
            } else {
                $low = $mid + 1;
            }
        }

        return -1;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
echo (new Solution())->findPeakElement([1, 2, 1, 3, 5, 6, 4]).PHP_EOL;
echo (new Solution())->findPeakElement([1]).PHP_EOL;
echo (new Solution())->findPeakElement([1, 2]).PHP_EOL;
