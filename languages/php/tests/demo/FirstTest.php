<?php

namespace Tests\demo;

use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{
    public function testTrueAssertsToTrue()
    {
        $condition = true;
        $this->assertTrue($condition);
    }
}
