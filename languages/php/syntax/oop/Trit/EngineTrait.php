<?php

namespace syntax\oop\Trit;

trait EngineTrait
{
    protected $engine;

    public function print(): void
    {
        echo "发动机个数：" . $this->engine . PHP_EOL;
    }

    protected function three(): void
    {
        $this->engine = 3;
    }

    protected function four(): void
    {
        $this->engine = 4;
    }
}
