<?php

namespace DesignPatterns\Creational\FactoryMethod;

/**
 * Ferrari（法拉利）
 */
class Ferrari implements VehicleInterface
{
    /**
     * @var string
     */
    protected $color;

    /**
     * @param string $rgb
     */
    public function setColor(string $rgb)
    {
        $this->color = $rgb;
    }
}
