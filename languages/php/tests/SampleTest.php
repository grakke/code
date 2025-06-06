<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class SampleTest extends TestCase
{
    public function testSomething()
    {
        $this->assertTrue(true, 'This should already work.');
    }

    /**
     * @test
     */
    public function something()
    {
        $this->assertTrue(true, 'This should already work.');
    }
}
