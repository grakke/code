<?php

namespace syntax\oop;

include './ObjectIterator.php';

use IteratorAggregate;

class ObjectSample implements IteratorAggregate
{
    public $data = array();

    public function __construct($in)
    {
        $this->data = $in;
    }

    public function getIterator()
    {
        return new ObjectIterator($this);
    }
}

$myObject = new ObjectSample(array(2, 4, 6, 8, 10));
$myIterator = $myObject->getIterator();
for ($myIterator->rewind(); $myIterator->valid(); $myIterator->next()) {
    $key = $myIterator->key();
    $value = $myIterator->current();
    echo $key." => ".$value."<br />";
}
