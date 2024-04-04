<?php declare(strict_types=1);

namespace Tests\demo;

use PHPUnit\Framework\TestCase;
use Src\Dependency;
use Src\SomeClass;
use Src\SomeInterface;
use Src\X;
use Src\Y;

final class StubForIntersectionExampleTest extends TestCase
{
    public function testCreateStubForIntersection(): void
    {
        $o = $this->createStubForIntersectionOfInterfaces([X::class, Y::class]);

        // $o is of type X ...
        $this->assertInstanceOf(X::class, $o);

        // ... and $o is of type Y
        $this->assertInstanceOf(Y::class, $o);
    }

    public function testCreateConfiguredStub(): void
    {
        $o = $this->createConfiguredStub(
            SomeInterface::class,
            [
                'doSomething' => 'foo',
                'doSomethingElse' => 'bar',
            ]
        );

        // $o->doSomething() now returns 'foo'
        $this->assertSame('foo', $o->doSomething());

        // $o->doSomethingElse() now returns 'bar'
        $this->assertSame('bar', $o->doSomethingElse());
    }

    public function testDoesSomething(): void
    {
        $sut = new SomeClass;

        // Create a test stub for the Dependency interface
        $dependency = $this->createStub(Dependency::class);

        // Configure the test stub
        $dependency->method('doSomething')
            ->willReturn('foo');

        $result = $sut->doSomething($dependency);

        $this->assertStringEndsWith('foo', $result);
    }
}
