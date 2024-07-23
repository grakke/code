<?php

namespace DesignPatterns\Creational\FactoryMethod;

/**
 * ItalianFactory 意大利的造车厂
 */
class ItalianFactory extends FactoryMethod
{
    /**
     * {@inheritdoc}
     */
    protected function createVehicle($type): VehicleInterface
    {
        switch ($type) {
            case parent::SLOW:
                return new Bicycle();
                break;
            case parent::FAST:
                return new Ferrari();
                break;
            default:
                throw new \InvalidArgumentException("$type is not a valid vehicle");
        }
    }
}
