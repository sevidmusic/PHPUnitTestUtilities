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

```
Darling\PHPUnitTestUtilities\traits\PHPUnitConfigurationTests
```

The `PHPUnitConfigurationTests` trait defines tests to make sure
phpunit is able to run.

```
Darling\PHPUnitTestUtilities\traits\PHPUnitTestMessages
```

The `PHPUnitTestMessages` trait defines methods that return formatted
strings that can be used to output messages from phpunit tests,for
example, when a test fails.

```
Darling\PHPUnitTestUtilities\traits\PHPUnitRandomValues
```

The `PHPUnitRandomValues` trait defines methods that return random
values of various types that can be used by classes that implement
phpunit tests.

```

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
            [$this->randomFloat(), $this->randomChars()],
            $this->testFailedMessage(
                $this,
                'testArrayIsEmpty',
                'return an empty array'
            )
        );
    }
}

```
