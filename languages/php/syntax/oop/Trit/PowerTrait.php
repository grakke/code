<?php

namespace syntax\oop\Trit;

trait PowerTrait
{
    protected $power;

    public function battery()
    {
        $this->power = '电池';
    }


    protected function gas()
    {
        $this->power = '汽油';
    }

    private function water()
    {
        $this->power = '水';
    }

    public function printText()
    {
        echo "动力来源：" . $this->power . PHP_EOL;
    }
}
