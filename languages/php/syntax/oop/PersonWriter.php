<?php

namespace syntax\oop;

interface PersonWriter
{
    public function write(Person $person): void;
}
