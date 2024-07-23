<?php

namespace syntax\oop;

include './Trit/EngineTrait.php';
include './Trit/PowerTrait.php';

use syntax\oop\Trit\PowerTrait;

trait Component
{
    use PowerTrait, PowerTrait {
        Engine::printText insteadof PowerTrait;
        PowerTrait::printText as printPower;
        Engine::printText as printEngine;
    }

    protected function init()
    {
        $this->gas();
        $this->four();
    }
}
