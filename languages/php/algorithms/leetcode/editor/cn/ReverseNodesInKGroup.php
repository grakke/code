<?php

namespace Algorithms\leetcode\editor\cn;

//给你一个链表，每 k 个节点一组进行翻转，请你返回翻转后的链表。
//
// k 是一个正整数，它的值小于或等于链表的长度。
//
// 如果节点总数不是 k 的整数倍，那么请将最后剩余的节点保持原有顺序。
//
// 进阶：
// 可以设计一个只使用常数额外空间的算法来解决此问题吗？
// 你不能只是单纯的改变节点内部的值，而是需要实际进行节点交换。
//
// 示例 1： 输入：head = [1,2,3,4,5], k = 2 输出：[2,1,4,3,5]
//
// 示例 2： 输入：head = [1,2,3,4,5], k = 3 输出：[3,2,1,4,5]
//
// 示例 3： 输入：head = [1,2,3,4,5], k = 1 输出：[1,2,3,4,5]
//
// 示例 4： 输入：head = [1], k = 1 输出：[1]
//

// 提示：
// 列表中节点的数量在范围 sz 内
// 1 <= sz <= 5000
// 0 <= Node.val <= 1000
// 1 <= k <= sz
//
// Related Topics 链表

//leetcode submit region begin(Prohibit modification and deletion)
use SplStack;

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution
{

    /*
    * 左闭开区间
     */
    private function reverse($head, $tail)
    {
        $prev = $tail->next;
        $p = $head;

        while ($prev != $tail) {
            $next = $p->next;
            $p->next = $prev;
            $prev = $p;
            $p = $next;
        }

        return [$tail, $head];
    }

    /**
     * iterator
     * @param ListNode $head
     * @param Integer $k
     *
     * @return ListNode
     */

    public function reverseKGroup($head, $k)
    {
        $dummy = new ListNode();
        $dummy->next = $head;
        $pre = $dummy;

        while ($head != null) {
            $tail = $pre;
            for ($i = 0; $i < $k; ++$i) {
                $tail = $tail->next;
                if ($tail == null) {
                    return $dummy->next;
                }
            }

            $next = $tail->next;
            list($head, $tail) = $this->reverse($head, $tail);
// 把子链表重新接回原链表
            $pre->next = $head;
            $tail->next = $next;

            $pre = $tail;
            $head = $tail->next;
        }

        return $dummy->next;
    }

    /**
     * recursive
     *
     * @param $head
     * @param $k
     * @return mixed
     */
    public function reverseKGroup2($head, $k)
    {
        if ($head == null || $head->next == null) {
            return $head;
        }

        $tail = $head;
        for ($i = 0; $i < $k; $i++) {
            //剩余数量小于k的话，不需要反转
            if ($tail == null) {
                return $head;
            }
            $tail = $tail->next;
        }
        // 反转前 k 个元素
        $newHead = $this->reverse($head, $tail);
        //下一轮的开始的地方就是tail
        $head->next = $this->reverseKGroup($tail, $k);

        return $newHead;
    }


    public function reverseKGroup1($head, $k)
    {
        $stack = new SplStack();
        $dummy = new ListNode();
        $p = $dummy;

        while (true) {
            $count = 0;
            $tmp = $head;

            while ($tmp != null && $count < $k) {
                $stack->push($tmp);
                $tmp = $tmp->next;
                $count++;
            }

            // 剩下的链表个数够不够 k 个（因为不够 k 个不用翻转）已翻转部分要与剩下链表连接起来。
            if ($count != $k) {
                $p->next = $head;
                break;
            }

            while (!$stack->isEmpty()) {
                $p->next = $stack->pop();
                $p = $p->next;
            }

            // align old and new, update head
            $p->next = $tmp;
            $head = $tmp;
        }

        return $dummy->next;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
