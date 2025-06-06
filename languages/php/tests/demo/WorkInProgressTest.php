<?php declare(strict_types=1);

namespace Tests\Demo;

use PHPUnit\Framework\TestCase;

final class WorkInProgressTest extends TestCase
{

    public function testSomething(): void
    {
        // Optional: Test anything here, if you want.
        $this->assertTrue(true, 'This should already work.');

        // Stop here and mark this tests as incomplete.
        $this->markTestIncomplete(
            'This tests has not been implemented yet.',
        );
    }
}
