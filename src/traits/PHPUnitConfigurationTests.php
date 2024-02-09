<?php

namespace Darling\PHPUnitTestUtilities\traits;

use \PHPUnit\Framework\Attributes\CoversNothing;

#[CoversNothing]
trait PHPUnitConfigurationTests
{

    /**
     * Test that PHPUnit tests run.
     *
     * If this test does not run then PHPUnit is not set up correctly.
     *
     */
    public function test_php_unit_tests_are_run(): void
    {
        $this->assertTrue(
            true,
            $this->testFailedMessage(
                $this,
                'test_php_unit_tests_are_run',
                'run if PHPUnit is set up correctly'
            )
        );
    }

    abstract public static function assertTrue(mixed $condition, string $message = ''): void;
    abstract protected function testFailedMessage( object $testedInstance, string $testedMethod, string $expectation): string;

}
