<?php

namespace Tests\demo;

use PHPUnit\Framework\TestCase;
use Tools\CsvFileIterator;

class DataProvider extends TestCase
{
    public static function addtionProvider()
    {
        return [
            [0, 1, 1],
            [1, 0, 1],
            [1, 0, 1],
            [1, 1, 2]
        ];
    }

    public static function additionWithNegativeNumbersProvider(): array
    {
        return [
            [-1, 1, 0],
            [-1, -1, -2],
            [1, -1, 0]
        ];
    }

    public static function addtionWithNameProvider()
    {
        return [
            'adding zeros' => [0, 0, 0],
            'zero plus one' => [0, 1, 1],
            'one plus zero' => [1, 0, 1],
            'one plus one' => [1, 1, 2]
        ];
    }

    public static function addtionWithCsvProvider()
    {
        return new CsvFileIterator(__DIR__ . '/../../assets/files/data.csv');
    }

    /**
     * @dataProvider addtionProvider
     * @dataProvider addtionWithNameProvider
     * @dataProvider addtionWithCsvProvider
     * @dataProvider additionWithNegativeNumbersProvider
     */
    public function testAdd($a, $b, $expected)
    {
        $this->assertEquals($expected, $a + $b);
    }

    public static function trueValues()
    {
        return [
            [1],
            ['1'],
            ['on'],
            [true]
        ];
    }

    /**
     * @dataProvider trueValues
     */
    public function testBooleanEvaluation($value)
    {
        $actual = (bool)$value;
        $this->assertTrue($actual);
    }
}
