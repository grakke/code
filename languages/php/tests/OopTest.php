<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Syntax\Oop\B;

class OopTest extends TestCase
{
    /**
     * @skip
     * @TODO:fix
     * 延迟绑定
     */
    public function testStatic()
    {
        $this->assertEquals(B::class, B::who());
        $this->assertEquals(B::class, B::who());
        $this->assertEquals(B::class, (new  B())->getClassName());

//        B::tests();
//        echo PHP_EOL;
//        B::who();
//        echo PHP_EOL;
//        echo (new  B())->getClassName();
//        echo PHP_EOL;
//        echo C::foo();
    }
}
