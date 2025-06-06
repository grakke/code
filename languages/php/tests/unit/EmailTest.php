<?php

namespace Tests\unit;

use Application\http\model\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testCanBeCreatedFromValidEmailAddress(): void
    {
        $this->assertInstanceOf(
            Email::class,
            Email::fromString('user@example.com')
        );
    }

    // public function testCannotBeCreatedFromInvalidEmailAddress(): void
    // {
    //    $this->expectException(InvalidArgumentException::class);
    //     $this->expectError();
    //     Email::fromString('invalid');
    // }

    public function testCanBeUsedAsString(): void
    {
        $this->assertEquals(
            'user@example.com',
            Email::fromString('user@example.com')
        );
    }
}
