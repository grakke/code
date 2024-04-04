<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class ArrayDiffTest extends TestCase
{
    public function testEquality()
    {
        $this->assertEquals([1, 2, 3, 4, 5, 6], ['1', 2, 33, 4, 5, 6]);
    }

    public function testEqualityWithDetail(): void
    {
        $this->assertSame(
            [1, 2, 3, 4, 5, 6],
            [1, 2, 33, 4, 5, 6],
        );
    }
}
