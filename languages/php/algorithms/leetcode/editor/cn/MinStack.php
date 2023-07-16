<?php

namespace Algorithms\leetcode\editor\cn;

//设计一个支持 push ，pop ，top 操作，并能在常数时间内检索到最小元素的栈。
//
//
// push(x) —— 将元素 x 推入栈中。
// pop() —— 删除栈顶的元素。
// top() —— 获取栈顶元素。
// getMin() —— 检索栈中的最小元素。
//
//
//
//
// 示例:
//
// 输入：
//["MinStack","push","push","push","getMin","pop","top","getMin"]
//[[],[-2],[0],[-3],[],[],[],[]]
//
//输出：
//[null,null,null,null,-3,null,0,-2]
//
//解释：
//MinStack minStack = new MinStack();
//minStack.push(-2);
//minStack.push(0);
//minStack.push(-3);
//minStack.getMin();   --> 返回 -3.
//minStack.pop();
//minStack.top();      --> 返回 0.
//minStack.getMin();   --> 返回 -2.
//
//
//
//
// 提示：
//
//
// pop、top 和 getMin 操作总是在 非空栈 上调用。
//
// Related Topics 栈 设计
// 👍 914 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
use SplStack;

/**
 * Class MinStack
 *
 * @package Algorithms\leetcode\editor\cn
 *
 * 通过stack维护数据结构
 */
class MinStack
{
    private $main_stack;
    private $min_stack;

    /**
     * initialize your data structure here.
     */
    public function __construct()
    {
        $this->main_stack = new SplStack();
        $this->min_stack = new SplStack();
    }

    /**
     * @param Integer $val
     *
     * @return NULL
     */
    public function push(int $val)
    {
        $this->main_stack->push($val);

        if ($this->min_stack->isEmpty()) {
            $this->min_stack->push($val);
        } else {
            $this->min_stack->push(min($this->min_stack->top(), $val));
        }
    }

    /**
     * @return NULL
     */
    public function pop()
    {
        if (!$this->main_stack->isEmpty()) {
            $this->main_stack->pop();
            $this->min_stack->pop();
        }
    }

    /**
     * @return Integer
     */
    public function top()
    {
        if (!$this->main_stack->isEmpty()) {
            return $this->main_stack->top();
        }
    }

    /**
     * @return Integer
     */
    public function getMin()
    {
        if (!$this->min_stack->isEmpty()) {
            return $this->min_stack->top();
        }
    }
}

/**
 * Your MinStack object will be instantiated and called as such:
 * $obj = MinStack();
 * $obj->push($val);
 * $obj->pop();
 * $ret_3 = $obj->top();
 * $ret_4 = $obj->getMin();
 */
//leetcode submit region end(Prohibit modification and deletion)
