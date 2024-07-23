<?php

namespace Algorithms\leetcode\editor\cn;

//输入两个整数序列，第一个序列表示栈的压入顺序，请判断第二个序列是否为该栈的弹出顺序。假设压入栈的所有数字均不相等。例如，序列 {1,2,3,4,5} 是某栈
//的压栈序列，序列 {4,5,3,2,1} 是该压栈序列对应的一个弹出序列，但 {4,3,5,1,2} 就不可能是该压栈序列的弹出序列。
//
//
//
// 示例 1：
//
// 输入：pushed = [1,2,3,4,5], popped = [4,5,3,2,1]
//输出：true
//解释：我们可以按以下顺序执行：
//push(1), push(2), push(3), push(4), pop() -> 4,
//push(5), pop() -> 5, pop() -> 3, pop() -> 2, pop() -> 1
//
//
// 示例 2：
//
// 输入：pushed = [1,2,3,4,5], popped = [4,3,5,1,2]
//输出：false
//解释：1 不能在 2 之前弹出。
//
//
//
//
// 提示：
//
//
// 0 <= pushed.length == popped.length <= 1000
// 0 <= pushed[i], popped[i] < 1000
// pushed 是 popped 的排列。
//
//
// 注意：本题与主站 946 题相同：https://leetcode-cn.com/problems/validate-stack-sequences/
// 👍 184 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
use SplStack;

class Solution
{

    /**
     * // 安装pushed 顺序 push
     * top == pop[i] 时pop,否则 continue push
     *
     * @param  Integer[]  $pushed
     * @param  Integer[]  $popped
     *
     * @return Boolean
     */
    public static function validateStackSequences($pushed, $popped)
    {
        $stack = new SplStack();
        // 索引设置的好：相当指针
        $i = 0;
        foreach ($pushed as $val) {
            $stack->push($val);
            while (!$stack->isEmpty() && $stack->top() == $popped[$i]) {
                $stack->pop();
                $i++;
            }
        }


        return $stack->isEmpty();
    }
}

//leetcode submit region end(Prohibit modification and deletion)

var_dump(Solution::validateStackSequences([1, 2, 3, 4, 5], [4, 5, 3, 2, 1]));
