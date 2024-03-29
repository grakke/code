<?php

/**
 * A path in a binary tree is a sequence of nodes where each pair of adjacent
 * nodes in the sequence has an edge connecting them. A node can only appear in the
 * sequence at most once. Note that the path does not need to pass through the root.
 *
 * The path sum of a path is the sum of the node's values in the path.
 *
 * Given the root of a binary tree, return the maximum path sum of any path.
 *
 *
 * Example 1:
 *
 *
 * Input: root = [1,2,3]
 * Output: 6
 * Explanation: The optimal path is 2 -> 1 -> 3 with a path sum of 2 + 1 + 3 = 6.
 *
 *
 * Example 2:
 *
 *
 * Input: root = [-10,9,20,null,null,15,7]
 * Output: 42
 * Explanation: The optimal path is 15 -> 20 -> 7 with a path sum of 15 + 20 + 7 =
 * 42.
 *
 *
 *
 * Constraints:
 *
 *
 * The number of nodes in the tree is in the range [1, 3 * 10⁴].
 * -1000 <= Node.val <= 1000
 *
 * Related Topics 树 深度优先搜索 动态规划 二叉树 👍 1252 👎 0
 */

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
     * @param  TreeNode  $root
     *
     * @return Integer
     */
    private $ans = 0;

    function maxPathSum($root)
    {
        if ($root == null) {
            return 0;
        }

        $left = max(0, $this->maxPathSum($root->left));
        $right = max(0, $this->maxPathSum($root->right));

        $this->ans = max($this->ans, $left + $right + $root->val);

        return max($left, $right) + $root->val;
    }
}
//leetcode submit region end(Prohibit modification and deletion)
