<?php

namespace DesignPatterns\Creational\FactoryMethod;

class Porsche implements VehicleInterface
{
    protected string $color;

    public function setColor(string $rgb): void
    {
        $this->color = $rgb;
    }

    /**
     * 尽管只有奔驰汽车挂有AMG品牌，这里提供一个空方法仅作代码示例
     */
    public function addTuningAMG()
    {
    }
}
