<?php

namespace Algorithms\leetcode\editor\cn;

//整数转换。编写一个函数，确定需要改变几个位才能将整数A转成整数B。
//
// 示例1:
//
//
// 输入：A = 29 （或者0b11101）, B = 15（或者0b01111）
// 输出：2
//
//
// 示例2:
//
//
// 输入：A = 1，B = 2
// 输出：2
//
//
// 提示:
//
//
// A，B范围在[-2147483648, 2147483647]之间
//
// Related Topics 位运算
// 👍 29 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
class Solution
{

    /**
     * @param Integer $A
     * @param Integer $B
     * @return Integer
     */
    public function convertInteger($A, $B)
    {
        $res = $A ^ $B;
        $count = 0;

        for ($i = 0; $i < 32; $i++) {
            if (($res & (1 << $i)) != 0) {
                $count++;
            }
        }

        return $count;
    }
}

//leetcode submit region end(Prohibit modification and deletion)
echo (new Solution())->convertInteger(29, 15) . PHP_EOL;
