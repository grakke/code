<?php

namespace Algorithms\data_structure\Queue;

use SplPriorityQueue;

class PriorityQueueBySpl extends SplPriorityQueue
{

    public function compare($priority1, $priority2)
    {
        return $priority1 <=> $priority2;
    }
}

$agents = new PriorityQueueBySpl();

$agents->insert("Fred", 1);
$agents->insert("John", 2);
$agents->insert("Keith", 3);
$agents->insert("Adiyan", 4);
$agents->insert("Mikhael", 2);

//mode of extraction
$agents->setExtractFlags(MyPQ::EXTR_BOTH);

//Go to TOP
$agents->top();

while ($agents->valid()) {
    $current = $agents->current();
    echo $current['data'] . "\n";
    $agents->next();
}
