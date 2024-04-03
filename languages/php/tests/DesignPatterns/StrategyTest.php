<?php

namespace Tests\DesignPatterns;

use DesignPatterns\Behavioral\Strategy\DateComparator;
use DesignPatterns\Behavioral\Strategy\IdComparator;
use DesignPatterns\Behavioral\Strategy\ObjectCollection;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class StrategyTest extends TestCase
{
    public static function getIdCollection(): array
    {
        return [
            [
                [['id' => 2], ['id' => 1], ['id' => 3]],
                ['id' => 1]
            ],
            [
                [['id' => 3], ['id' => 2], ['id' => 1]],
                ['id' => 1]
            ]
        ];
    }

    #[DataProvider('getIdCollection')]
    public function testIdComparator($collection, $expected): void
    {
        $obj = new ObjectCollection($collection);
        $obj->setComparator(new IdComparator());
        $elements = $obj->sort();
        $firstElement = array_shift($elements);

        $this->assertEquals($expected, $firstElement);
    }

    public static function getDateCollection(): array
    {
        return [
            [
                [['date' => '2014-03-03'], ['date' => '2015-03-02'], ['date' => '2013-03-01']],
                ['date' => '2013-03-01']
            ],
            [
                [['date' => '2014-02-03'], ['date' => '2013-02-01'], ['date' => '2015-02-02']],
                ['date' => '2013-02-01']
            ],
        ];
    }

    #[DataProvider("getDateCollection")]
    public function testDateComparator($collection, $expected)
    {
        $obj = new ObjectCollection($collection);
        $obj->setComparator(new DateComparator());
        $elements = $obj->sort();
        $firstElement = array_shift($elements);

        $this->assertEquals($expected, $firstElement);
    }
}
