# PHPUnitTestUtilities

A collection of traits that define methods to aide in the
implementation of phpunit tests.

# Installation

```
composer require darling/php-unit-test-utilities
```

# Usage

The `PHPUnitTestUtilities` library provides the following traits
which can be used by classes that implement phpunit tests.


### PHPUnitConfigurationTests

```
Darling\PHPUnitTestUtilities\traits\PHPUnitConfigurationTests
```

This trait defines tests to make sure phpunit is able to run.

### PHPUnitTestMessages

```
Darling\PHPUnitTestUtilities\traits\PHPUnitTestMessages
```

This trait defines methods that return formatted strings that can be
used to output messages from phpunit tests,for example, when a test
fails.


### PHPUnitRandomValues

```
Darling\PHPUnitTestUtilities\traits\PHPUnitRandomValues
```

The `PHPUnitRandomValues` trait defines methods that return random
values of various types that can be used by classes that implement
phpunit tests.


# Example

```
<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use Darling\PHPUnitTestUtilities\traits\PHPUnitConfigurationTests;
use Darling\PHPUnitTestUtilities\traits\PHPUnitTestMessages;
use Darling\PHPUnitTestUtilities\traits\PHPUnitRandomValues;

/**
 * This class serves as an example of how the traits provided by the
 * PHPUnitTestUtilities library can be used in a phpunit test class.
 *
 */
class PHPUnitTestUtilitesTest extends TestCase
{
    use PHPUnitConfigurationTests;
    use PHPUnitTestMessages;
    use PHPUnitRandomValues;

    public function testArrayIsEmpty()
    {
        $this->assertEmpty(
            [
                $this->randomChars(),
                $this->randomFloat(),
                $this->randomClassStringOrObjectInstance(),
                $this->randomObjectInstance(),
            ],
            $this->testFailedMessage(
                $this,
                '',
                'array must be empty'
            )
        );
    }

}

```

The example test above would result in the following failing test when
phpunit is run:

```
PHPUnit 9.6.3 by Sebastian Bergmann and contributors.

Runtime:       PHP 8.1.2
Configuration: /home/darling/Git/PHPUnitTestUtilities/php.xml
Random Seed:   1676152933

F.                                                                  2 / 2 (100%)

Time: 00:00.083, Memory: 6.00 MB

There was 1 failure:

1) tests\PHPUnitTestUtilitesTest::testArrayIsEmpty
The tests\PHPUnitTestUtilitesTest implementation fails to fulfill the following expectation:

array must be empty.
Failed asserting that an array is empty.

/home/darling/Git/PHPUnitTestUtilities/src/traits/PHPUnitConfigurationTests.php:38

FAILURES!
Tests: 2, Assertions: 2, Failures: 1.

```

