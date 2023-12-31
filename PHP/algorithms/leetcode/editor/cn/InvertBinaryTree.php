<?php

namespace Algorithms\leetcode\editor\cn;

//翻转一棵二叉树。
//
// 示例：
//
// 输入：
//
//      4
//   /   \
//  2     7
// / \   / \
//1   3 6   9
//
// 输出：
//
//      4
//   /   \
//  7     2
// / \   / \
//9   6 3   1
//
// 备注:
//这个问题是受到 Max Howell 的 原问题 启发的 ：
//
// 谷歌：我们90％的工程师使用您编写的软件(Homebrew)，但是您却无法在面试时在白板上写出翻转二叉树这道题，这太糟糕了。
// Related Topics 树
// 👍 888 👎 0

//leetcode submit region begin(Prohibit modification and deletion)
use SplQueue;

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
     * @param TreeNode $root
     * @return TreeNode
     */
    public function invertTree($root)
    {
        if ($root->left) {
            $root->left = $this->invertTree($root->left);
        }
        if ($root->right) {
            $root->right = $this->invertTree($root->right);
        }

        $newNode = $root->right;
        $root->right = $root->left;
        $root->left = $newNode;

        return $root;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
