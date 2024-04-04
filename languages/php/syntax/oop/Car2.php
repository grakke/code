<?php

namespace syntax\oop;

include 'Engine.php';
include 'Component.php';

class Car2 extends Engine
{
    use Component;

    public function drive()
    {
        // 初始化系统
        $this->init();
        $this->printPower();
        $this->printEngine();
        echo "汽车启动..." . PHP_EOL;
    }
}
