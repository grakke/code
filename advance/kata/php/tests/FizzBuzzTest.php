<?php

declare(strict_types=1);


namespace Tests;

use PHPUnit\Framework\TestCase;
use swkberlin\FizzBuzz;

class FizzBuzzTest extends TestCase
{
    private $fizzbuzz;

    public function setUp(): void
    {
        parent::setUp();
        $this->fizzbuzz = new FizzBuzz();
        $this->fizzbuzz->exectute();
    }

    public function testPrintNumber(): void
    {
        $this->assertEquals(68, $this->fizzbuzz->result[67]);
    }

    public function testPrintFizzWhenMultiplesOfThree()
    {
        $this->assertEquals('Fizz', $this->fizzbuzz->result[26]);
    }
    public function testPrintBuzzWhenMultiplesOfFive()
    {
        $this->assertEquals('Buzz', $this->fizzbuzz->result[69]);
    }
    public function testPrintFizzBuzzWhenMultiplesOfThreeAndFive()
    {
        $this->assertEquals('FizzBuzz', $this->fizzbuzz->result[74]);
    }
}
