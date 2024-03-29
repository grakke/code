<?php


namespace Algorithms\Tree;

include '../../vendor/autoload.php';

class BinaryTreeByArray
{
    public $nodes = [];

    public function __construct(array $nodes)
    {
        $this->nodes = $nodes;
    }

    public function traverse(int $num = 0, int $level = 0)
    {
        if (isset($this->nodes[$num])) {
            echo str_repeat("-", $level);
            echo $this->nodes[$num] . "\n";
            $this->traverse(2 * $num + 1, $level + 1);
            $this->traverse(2 * ($num + 1), $level + 1);
        }
    }
}

try {
    $nodes = [];
    $nodes[] = "Final";
    $nodes[] = "Semi Final 1";
    $nodes[] = "Semi Final 2";
    $nodes[] = "Quarter Final 1";
    $nodes[] = "Quarter Final 2";
    $nodes[] = "Quarter Final 3";
    $nodes[] = "Quarter Final 4";

    $tree = new BinaryTreeByArray($nodes);
    $tree->traverse(0);
} catch (Exception $e) {
    echo $e->getMessage();
}
