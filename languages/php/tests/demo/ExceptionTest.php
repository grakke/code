<?php

namespace Tests\demo;

use ArrayIterator;
use Exception;
use PHPUnit\Framework\Error;
use PHPUnit\Framework\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ExceptionTest extends TestCase
{
    public function testMethodRaiseExceptionAgain()
    {
        $this->expectException(InvalidArgumentException::class);
        $iterator = new ArrayIterator(42);
    }

    public function testInvalidArgumentException(): void
    {
        $this->expectException(InvalidArgumentException::class);
    }

//    public function testFailingInclude()
//    {
//        $this->expectException(Error::class);
//        include 'not_existing_file.php';
//    }

    public function testException()
    {
        $this->expectException(Exception::class);

        throw new Exception('test');
    }

    /**
     * @throws Exception
     * @test
     */
    public function exceptionExpect()
    {
        $this->expectException(Exception::class);
        throw new Exception('test');
    }
}
