<?php

namespace Tests\DesignPatterns;

use DesignPatterns\Creational\StaticFactory\StaticFactory;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class StaticFactoryTest extends TestCase
{
    public static function getTypeList()
    {
        return [
            ['string'],
            ['number']
        ];
    }

    /**
     * @dataProvider getTypeList
     */
    public function testCreation($type)
    {
        $obj = StaticFactory::factory($type);
        $this->assertInstanceOf('DesignPatterns\Creational\StaticFactory\FormatterInterface', $obj);
    }

    public function testException()
    {
        $this->expectException(InvalidArgumentException::class);
        StaticFactory::factory("");
    }
}
