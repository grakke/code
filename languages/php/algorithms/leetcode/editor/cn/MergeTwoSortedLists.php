<?php

namespace Algorithms\leetcode\editor\cn;

//将两个升序链表合并为一个新的升序链表并返回。新链表是通过拼接给定的两个链表的所有节点组成的。
//
// 示例 1： 输入：l1 = [1,2,4], l2 = [1,3,4] 输出：[1,1,2,3,4,4]
//
// 示例 2： 输入：l1 = [], l2 = [] 输出：[]
//
// 示例 3：  输入：l1 = [], l2 = [0] 输出：[0]
//
// 提示：
//
// 两个链表的节点数目范围是 [0, 50]
// -100 <= Node.val <= 100
// l1 和 l2 均按 非递减顺序 排列
//
// Related Topics 递归 链表

//leetcode submit region begin(Prohibit modification and deletion)

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

    /**
     * 双指针实现
     *
     * @param ListNode $l1
     * @param ListNode $l2
     *
     * @return ListNode
     */
    public function mergeTwoLists1($l1, $l2)
    {
        if (empty($l1)) {
            return $l2;
        }
        if (empty($l2)) {
            return $l1;
        }

        $newHead = new ListNode();
        $p = $newHead;
        while ($l1 && $l2) {
            if ($l1->val <= $l2->val) {
                $p->next = $l1;
                $p = $l1;
                $l1 = $l1->next;
            } else {
                $p->next = $l2;
                $p = $l2;
                $l2 = $l2->next;
            }
        }

        while ($l1) {
            $p->next = $l1;
            $p = $l1;
            $l1 = $l1->next;
        }

        while ($l2) {
            $p->next = $l2;
            $p = $l2;
            $l2 = $l2->next;
        }

        return $newHead->next;
    }

    /**
     * recursive
     *
     * @param $l1
     * @param $l2
     */
    public function mergeTwoLists($l1, $l2)
    {
        if (empty($l1)) {
            return $l2;
        } elseif (empty($l2)) {
            return $l1;
        } elseif ($l1->val < $l2->val) {
            $l1->next = $this->mergeTwoLists($l1->next, $l2);
            return $l1;
        } else {
            $l2->next = $this->mergeTwoLists($l1, $l2->next);
            return $l2;
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)
