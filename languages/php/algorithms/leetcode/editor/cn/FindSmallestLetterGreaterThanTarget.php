<?php

namespace Algorithms\leetcode\editor\cn;

//给你一个排序后的字符列表 letters ，列表中只包含小写英文字母。另给出一个目标字母 target，寻找在这一有序列表里比目标字母大的最小字母。
//
// 在比较时，字母是依序循环出现的。举个例子：
//
//
// 如果目标字母 target = 'z' 并且字符列表为 letters = ['a', 'b']，则答案返回 'a'
//
//
//
//
// 示例：
//
// 输入:
//letters = ["c", "f", "j"]
//target = "a"
//输出: "c"
//
//输入:
//letters = ["c", "f", "j"]
//target = "c"
//输出: "f"
//
//输入:
//letters = ["c", "f", "j"]
//target = "d"
//输出: "f"
//
//输入:
//letters = ["c", "f", "j"]
//target = "g"
//输出: "j"
//
//输入:
//letters = ["c", "f", "j"]
//target = "j"
//输出: "c"
//
//输入:
//letters = ["c", "f", "j"]
//target = "k"
//输出: "c"
//
//
//
//
// 提示：
//
//
// letters长度范围在[2, 10000]区间内。
// letters 仅由小写字母组成，最少包含两个不同的字母。
// 目标字母target 是一个小写字母。
//
// Related Topics 二分查找
// 👍 117 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param  String[]  $letters
     * @param  String    $target
     *
     * @return String
     */
    public function nextGreatestLetter($letters, $target)
    {
        $low = 0;
        $high = count($letters);
        // boundary limit
        if ($target < $letters[0] || $target >= $letters[$high - 1]) {
            return $letters[0];
        }

        while ($low <= $high) {
            $mid = $low + floor(($high - $low) / 2);
            if ($letters[$mid] == $target) {
                // vitical condition
                if ($letters[$mid + 1] > $target) {
                    return $letters[$mid + 1];
                } else {
                    $low = $mid + 1;
                }
            }

            if ($letters[$mid] > $target) {
                $high = $mid - 1;
            } else {
                if ($letters[$mid + 1] > $target) {
                    return $letters[$mid + 1];
                }
                $low = $mid + 1;
            }
        }

        return $letters[0];
    }
}

//leetcode submit region end(Prohibit modification and deletion)

echo (new Solution())->nextGreatestLetter(['a', 'b'], 'z').PHP_EOL;
// a
echo (new Solution())->nextGreatestLetter(["c", "f", "j"], 'a').PHP_EOL;
echo (new Solution())->nextGreatestLetter(["c", "f", "j"], 'c').PHP_EOL;
echo (new Solution())->nextGreatestLetter(["c", "f", "j"], 'd').PHP_EOL;
echo (new Solution())->nextGreatestLetter(["c", "f", "j"], 'g').PHP_EOL;
echo (new Solution())->nextGreatestLetter(["c", "f", "j"], 'j').PHP_EOL;
echo (new Solution())->nextGreatestLetter(["c", "f", "j"], 'k').PHP_EOL;
// c f f j c c
echo (new Solution())->nextGreatestLetter(["e", "e", "e", "k", "q", "q", "q", "v", "v", "y"], 'q').PHP_EOL;
