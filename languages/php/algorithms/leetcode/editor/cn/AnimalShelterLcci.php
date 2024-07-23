<?php

namespace Algorithms\leetcode\editor\cn;

//动物收容所。有家动物收容所只收容狗与猫，且严格遵守“先进先出”的原则。在收养该收容所的动物时，收养人只能收养所有动物中“最老”（由其进入收容所的时间长短而定
//）的动物，或者可以挑选猫或狗（同时必须收养此类动物中“最老”的）。换言之，收养人不能自由挑选想收养的对象。请创建适用于这个系统的数据结构，实现各种操作方法，比如
//enqueue、dequeueAny、dequeueDog和dequeueCat。允许使用Java内置的LinkedList数据结构。
//
// enqueue方法有一个animal参数，animal[0]代表动物编号，animal[1]代表动物种类，其中 0 代表猫，1 代表狗。
//
// dequeue*方法返回一个列表[动物编号, 动物种类]，若没有可以收养的动物，则返回[-1,-1]。
//
// 示例1:
//
//  输入：
//["AnimalShelf", "enqueue", "enqueue", "dequeueCat", "dequeueDog", "dequeueAny"
//]
//[[], [[0, 0]], [[1, 0]], [], [], []]
// 输出：
//[null,null,null,[0,0],[-1,-1],[1,0]]
//
//
// 示例2:
//
//  输入：
//["AnimalShelf", "enqueue", "enqueue", "enqueue", "dequeueDog", "dequeueCat", "
//dequeueAny"]
//[[], [[0, 0]], [[1, 0]], [[2, 1]], [], [], []]
// 输出：
//[null,null,null,null,[2,1],[0,0],[1,0]]
//
//
// 说明:
//
//
// 收纳所的最大容量为20000
//
// Related Topics 设计

//leetcode submit region begin(Prohibit modification and deletion)
use SplQueue;

class AnimalShelf
{
    const TYPE_CAT = 0;
    const TYEP_DOG = 1;

    private $allQueue;
    private $catQueue;
    private $dogQueue;

    /**
     */
    public function __construct()
    {
        $this->allQueue = new SplQueue();
        $this->catQueue = new SplQueue();
        $this->dogQueue = new SplQueue();
    }

    /**
     * @param Integer[] $animal
     * @return NULL
     */
    public function enqueue($animal)
    {
        $this->allQueue->enqueue($animal);

        list($no, $type) = $animal;
        if ($type == static::TYEP_DOG) {
            $this->dogQueue->enqueue($no);
        } elseif ($type == static::TYPE_CAT) {
            $this->catQueue->enqueue($no);
        }
    }

    /**
     * @return Integer[]
     */
    public function dequeueAny()
    {
        if ($this->allQueue->isEmpty()) {
            return [-1, -1];
        }

        $animal = $this->allQueue->dequeue();
        list($no, $type) = $animal;

        while (!$this->allQueue->isEmpty()) {
            if ($type == static::TYEP_DOG) {
                $dogNo = $this->dogQueue->bottom();
                if ($no !== $dogNo) {
                    $animal = $this->allQueue->dequeue();
                    list($no, $type) = $animal;
                    continue;
                }
                if (!$this->dogQueue->isEmpty()) {
                    $this->dogQueue->dequeue();
                }
            } elseif ($type == static::TYPE_CAT) {
                $dogNo = $this->catQueue->bottom();
                if ($no !== $dogNo) {
                    $animal = $this->allQueue->dequeue();
                    list($no, $type) = $animal;
                    continue;
                }
                if (!$this->catQueue->isEmpty()) {
                    $this->catQueue->dequeue();
                }
            }
        }

        return $animal;
    }

    /**
     * @return Integer[]
     */
    public function dequeueDog()
    {
        if ($this->allQueue->isEmpty()) {
            return [-1, -1];
        }

        return [$this->dogQueue->dequeue() , static::TYEP_DOG];
    }

    /**
     * @return Integer[]
     */
    public function dequeueCat()
    {
        if ($this->allQueue->isEmpty()) {
            return [-1, -1];
        }

        return [$this->catQueue->dequeue() , static::TYPE_CAT];
    }
}

/**
 * Your AnimalShelf object will be instantiated and called as such:
 * $obj = AnimalShelf();
 * $obj->enqueue($animal);
 * $ret_2 = $obj->dequeueAny();
 * $ret_3 = $obj->dequeueDog();
 * $ret_4 = $obj->dequeueCat();
 */
//leetcode submit region end(Prohibit modification and deletion)
