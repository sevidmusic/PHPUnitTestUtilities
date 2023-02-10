<?php

namespace Darling\PHPUnitTestUtilities\traits;

trait PHPUnitTestMessages
{

    /**
     * Return a message that indicates the failure of a test.
     *
     * @param object $testedInstance The object instance that
     *                               was tested.
     *
     * @param string $testedMethod The name of the method that was
     *                             tested.
     *
     *                             Note: If the test is not specific
     *                             to a method, than an empty string
     *                             can be passed as the $testedMethod.
     *
     * @param string $expectation A brief description of what was
     *                            expected by the test.
     *
     * @example
     *
     * ```
     * echo $this->testFailedMessage(
     *     $this,
     *     'test_php_unit_tests_are_run',
     *     'run if PHPUnit is set up correctly'
     * );
     * // example output:
     *    The tests\PHPUnitTestUtilitesTestCase implementation's
     *    test_php_unit_tests_are_run() method must
     *    run if PHPUnit is set up correctly.
     *
     * ```
     */
    protected function testFailedMessage(
        object $testedInstance,
        string $testedMethod,
        string $expectation
    ): string
    {
        return match(empty($testedMethod)) {
            true => 'The ' .
                    $testedInstance::class .
                    ' implementation fails to fulfill the ' .
                    'following expectation:' .
                    str_repeat(PHP_EOL, 2) .
                    $expectation .
                    '.',
            default => 'The ' .
                       $testedInstance::class .
                       ' implementation\'s ' .
                       $testedMethod .
                       '() method must ' .
                       $expectation .
                       '.'
        };
    }
}
