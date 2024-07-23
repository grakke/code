<?php

namespace DesignPatterns\Creational\SimpleFactory;

class ConcreteFactory
{
    protected array $typeList;


    public function __construct()
    {
        $this->typeList = [
            'bicycle' => __NAMESPACE__ . '\Bicycle',
            'scooter' => __NAMESPACE__ . '\Scooter'
        ];
    }

    /**
     * 创建车子
     *
     * @param string $type a known type key
     *
     * @return VehicleInterface a new instance of VehicleInterface
     * @throws \InvalidArgumentException
     */
    public function createVehicle(string $type): VehicleInterface
    {
        if (!array_key_exists($type, $this->typeList)) {
            throw new \InvalidArgumentException("$type is not valid vehicle");
        }
        $className = $this->typeList[$type];

        return new $className();
    }
}
