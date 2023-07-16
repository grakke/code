<?php

namespace syntax\oop;

/**
 * 迭代器：实现 Iterator 接口就行
 */
class OwnIterator implements \Iterator
{
    private $position = 0;
    private $array = array(
        "firstelement",
        "secondelement",
        "lastelement",
    );

    public function __construct()
    {
        $this->position = 0;
    }

    public function rewind(): void
    {
        echo __METHOD__ . PHP_EOL;
        $this->position = 0;
    }

    public function current(): mixed
    {
        echo __METHOD__ . PHP_EOL;
        return $this->array[$this->position];
    }

    public function key(): mixed
    {
        echo __METHOD__ . PHP_EOL;
        return $this->position;
    }

    public function next(): void
    {
        echo __METHOD__ . PHP_EOL;
        ++$this->position;
    }

    public function valid(): bool
    {
        echo __METHOD__ . PHP_EOL;
        return isset($this->array[$this->position]);
    }
}
