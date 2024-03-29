<?php

namespace DesignPatterns\Creational\FactoryMethod;

/**
 * Bicycle（自行车）
 */
class Bicycle implements VehicleInterface
{
    /**
     * @var string
     */
    protected $color;

    /**
     * 设置自行车的颜色
     *
     * @param string $rgb
     */
    public function setColor(string $rgb): void
    {
        $this->color = $rgb;
    }
}
