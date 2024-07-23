<?php

namespace syntax\di;

class PersonWriter
{
    public function writeName(Person $p): void
    {
        print $p->getName() . "\n";
    }

    public function writeAge(Person $p): void
    {
        print $p->getAge() . "\n";
    }
}
