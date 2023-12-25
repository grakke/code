<?php

namespace Tests\DesignPatterns;

use DesignPatterns\Structural\Adapter\Book;
use DesignPatterns\Structural\Adapter\EBookAdapter;
use DesignPatterns\Structural\Adapter\Kindle;
use DesignPatterns\Structural\Adapter\PaperBookInterface;
use PHPUnit\Framework\TestCase;

class AdapterTest extends TestCase
{
    /**
     * @return array
     */
    public static function getBook(): array
    {
        return [
            [new Book()],
            [new EBookAdapter(new Kindle())]
        ];
    }

    /**
     * 客户端只知道有纸质书
     * 电子书通过适配器实现不同体系接入
     * 但是对客户来说代码一致，不需要做任何改动
     *
     * @param PaperBookInterface $book
     *
     * @dataProvider getBook
     */
    public function testIAmAnOldClient(PaperBookInterface $book)
    {
        $this->assertTrue(method_exists($book, 'open'));
        $this->assertTrue(method_exists($book, 'turnPage'));
    }
}
