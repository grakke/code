<?php

namespace Test\DesignPatterns;

use DesignPatterns\Creational\FactoryMethod\FactoryMethod;
use DesignPatterns\Creational\FactoryMethod\GermanFactory;
use DesignPatterns\Creational\FactoryMethod\ItalianFactory;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * FactoryMethodTest用于测试工厂方法模式
 */
class FactoryMethodTest extends TestCase
{
    protected array $types = [
        FactoryMethod::SLOW,
        FactoryMethod::FAST
    ];

    public static function getFactories(): array
    {
        return [
            [new GermanFactory()],
            [new ItalianFactory()]
        ];
    }

    /**
     * 客户端 不关心什么工厂，只知道可以可以用它来造车
     *
     * @dataProvider getFactories
     */
    public function testCreation(FactoryMethod $shop)
    {
        foreach ($this->types as $type) {
            $vehicle = $shop->create($type);
            $this->assertInstanceOf('DesignPatterns\Creational\FactoryMethod\VehicleInterface', $vehicle);
        }
    }

    /**
     * @dataProvider getFactories
     */
    public function testUnknownType(FactoryMethod $shop)
    {
        $this->expectExceptionMessage("spaceship is not a valid vehicle");
        $this->expectException(InvalidArgumentException::class);
        $shop->create('spaceship');
    }
}
