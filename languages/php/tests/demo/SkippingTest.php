<?php declare(strict_types=1);

namespace Tests\demo;

use PHPUnit\Framework\Attributes\RequiresPhpExtension;
use PHPUnit\Framework\TestCase;

// skip method 2
#[RequiresPhpExtension('pgsql')]
final class SkippingTest extends TestCase
{
    // skip method 1
//    public function testConnection(): void
//    {
//        // ...
//    }

    protected function setUp(): void
    {
        if (!extension_loaded('pgsql')) {
            $this->markTestSkipped(
                'The PostgreSQL extension is not available',
            );
        }
    }
}
