# PHPUnitTestUtilities

The PHPUnitTestUtilities library provides traits that define methods
to aide in the implementation of `phpunit` tests.

# Overview

- [Installation](#installation)

- [Traits](#traits)

  - [Darling\PHPUnitTestUtilities\traits\PHPUnitConfigurationTests](#darlingphpunittestutilitiestraitsphpunitconfigurationtests)
  - [Darling\PHPUnitTestUtilities\traits\PHPUnitTestMessages](#darlingphpunittestutilitiestraitsphpunittestmessages)
  - [Darling\PHPUnitTestUtilities\traits\PHPUnitRandomValues](#darlingphpunittestutilitiestraitsphpunitrandomvalues)

# Installation

```
composer require darling/php-unit-test-utilities
```

# Traits

### Darling\PHPUnitTestUtilities\traits\PHPUnitConfigurationTests

This trait defines the following test methods:

```
    /**
     * Test that phpunit tests run.
     *
     * If this test does not run then phpunit is not set up
     * correctly.
     *
     */
    public function test_php_unit_tests_are_run(): void;

```

Note: More detailed documentation can be found in the trait itself:

[tests/PHPUnitTestUtilities/traits/PHPUnitConfigurationTests.php](https://github.com/sevidmusic/PHPUnitTestUtilities/blob/main/src/traits/PHPUnitConfigurationTests.php)

### Darling\PHPUnitTestUtilities\traits\PHPUnitTestMessages

This trait defines the following methods to return formatted strings
that can be used to output messages from `phpunit` tests,for example,
when a test fails.

```
    /**
     * Return a message that indicates the failure of a test.
     *
     */
    protected function testFailedMessage(
        object $testedInstance,
        string $testedMethod,
        string $expectation
    ): void;

```

Note: More detailed documentation can be found in the trait itself:

[tests/PHPUnitTestUtilities/traits/PHPUnitTestMessages.php](https://github.com/sevidmusic/PHPUnitTestUtilities/blob/main/src/traits/PHPUnitTestMessages.php)

### Darling\PHPUnitTestUtilities\traits\PHPUnitRandomValues

The `PHPUnitRandomValues` trait defines the following methods that
return random values of various types.

```

    /**
     * Return a string composed of a random number of randomly
     * generated characters.
     *
     */
    protected function randomChars(): string

    /**
     * Return a random float.
     *
     */
    protected function randomFloat(): float

    /**
     * Return a random fully qualified class name, or object instance.
     *
     */
    protected function randomClassStringOrObjectInstance(): string|object

    /**
     * Return a random object instance.
     *
     */
    protected function randomObjectInstance(): object

```

Note: More detailed documentation can be found in the trait itself:

[tests/PHPUnitTestUtilities/traits/PHPUnitRandomValues.php](https://github.com/sevidmusic/PHPUnitTestUtilities/blob/main/src/traits/PHPUnitRandomValues.php)

# Example

The following is a hypothetical example of how the traits provided by
the PHPUnitTestUtilities library can be used in a class that
implements `phpunit` tests.

```
<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use Darling\PHPUnitTestUtilities\traits\PHPUnitConfigurationTests;
use Darling\PHPUnitTestUtilities\traits\PHPUnitTestMessages;
use Darling\PHPUnitTestUtilities\traits\PHPUnitRandomValues;

class ExampleTest extends TestCase
{
    use PHPUnitConfigurationTests;
    use PHPUnitTestMessages;
    use PHPUnitRandomValues;

    public function testArrayIsEmpty()
    {
        $testedInstance =
            (object) [
                'foo' => [
                    $this->randomChars(),
                    $this->randomFloat(),
                    $this->randomClassStringOrObjectInstance(),
                    $this->randomObjectInstance(),
                ]
            ];
        $this->assertEmpty(
            $testedInstance->foo,
            $this->testFailedMessage(
                $testedInstance,
                '',
                'The array assigned to the foo property must be empty'
            )
        );
    }

}

```

The example test above would result in the following failing test
when `phpunit` is run:

```
...

There was 1 failure:

1) tests\ExampleTest::testArrayIsEmpty
The stdClass implementation fails to fulfill the following expectation:

The array assigned to the foo property must be empty.
Failed asserting that an array is empty.

...

```

