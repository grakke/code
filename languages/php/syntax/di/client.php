<?php

include 'Mother.php';

use syntax\di\Book;
use syntax\di\Mother;
use syntax\di\Newspaper;
use syntax\di\Person;

$mother = new Mother();
print $mother->narrate(new Book()) . PHP_EOL;
print $mother->narrate(new Newspaper()) . PHP_EOL;

$p = new Person(new \syntax\di\PersonWriter());
$p->name = "Henry";
$p->age = 34;

if (isset($p->name)) {
    print $p->name . "\n";
    print $p->age . "\n";
}
print $p;
unset($p->name);
if (isset($p->name)) {
    print $p->name . "\n";
} else {
    print "Property is not exist";
}

$p->age =44;
$p->writeAge();

$p->setId(343);
unset($p);
