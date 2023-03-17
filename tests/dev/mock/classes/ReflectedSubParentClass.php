<?php

namespace Darling\PHPUnitTestUtilities\Tests\dev\mock\classes;

use \Closure;
use \stdClass;
use Darling\PHPUnitTestUtilities\Tests\dev\mock\classes\ReflectedBaseClass;

/**
 * This class is only intended to be used in tests.
 *
 * It has no other purpose.
 *
 */
class ReflectedSubParentClass extends ReflectedBaseClass
{
    public int $publicSubParentClassProperty = 2347923;
}
