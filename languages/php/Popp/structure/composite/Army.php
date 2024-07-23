<?php

namespace Popp\structure\composite;

class Army extends CompositeUnit
{
    public function bombardStrength()
    {
        return parent::bombardStrength() * 1.5;
    }
}
