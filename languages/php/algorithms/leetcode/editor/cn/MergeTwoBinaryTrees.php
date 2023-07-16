<?php

namespace Algorithms\leetcode\editor\cn;

//给定两个二叉树，想象当你将它们中的一个覆盖到另一个上时，两个二叉树的一些节点便会重叠。
//
// 你需要将他们合并为一个新的二叉树。合并的规则是如果两个节点重叠，那么将他们的值相加作为节点合并后的新值，否则不为 NULL 的节点将直接作为新二叉树的节点
//。
//
// 示例 1:
//
//
//输入:
//  Tree 1                     Tree 2
//          1                         2
//         / \                       / \
//        3   2                     1   3
//       /                           \   \
//      5                             4   7
//输出:
//合并后的树:
//       3
//      / \
//     4   5
//    / \   \
//   5   4   7
//
//
// 注意: 合并必须从两个树的根节点开始。
// Related Topics 树

//leetcode submit region begin(Prohibit modification and deletion)

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution
{

    /**
     * @param TreeNode $root1
     * @param TreeNode $root2
     * @return TreeNode
     */
    public function mergeTrees($root1, $root2)
    {
        if ($root1 == null && $root2 == null) {
            return null;
        } elseif ($root1 == null) {
            return $root2;
        } elseif ($root2 == null) {
            return $root1;
        } else {
            return new ListNode($root1->val + $root2->val, $this->mergeTrees($root1->left, $root2->left), $this->mergeTrees($root1->right, $root2->right));
        }
    }
}
//leetcode submit region end(Prohibit modification and deletion)
