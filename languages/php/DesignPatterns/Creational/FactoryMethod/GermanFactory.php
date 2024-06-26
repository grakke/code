<?php

namespace DesignPatterns\Creational\FactoryMethod;

/**
 * GermanFactory是德国的造车厂
 */
class GermanFactory extends FactoryMethod
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
                $obj = new Porsche();
                //因为已经知道是什么对象所以可以调用具体方法
                $obj->addTuningAMG();

                return $obj;
                break;
            default:
                throw new \InvalidArgumentException("$type is not a valid vehicle");
        }
    }
}
