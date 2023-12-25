<?php

namespace DesignPatterns\Creational\FactoryMethod;

/**
 * 工厂方法抽象类
 */
abstract class FactoryMethod
{
    const SLOW = 1;
    const FAST = 2;


    abstract protected function createVehicle(int $type): VehicleInterface;

    /**
     * 创建新的车辆
     *
     *
     * @return VehicleInterface a new vehicle
     */
    public function create($type): VehicleInterface
    {
        $obj = $this->createVehicle($type);
        $obj->setColor("#f00");

        return $obj;
    }
}
