<?php

namespace Darling\PHPUnitTestUtilities\traits;

use \stdClass;
use tests\dev\mock\classes\ClassABaseClass;
use tests\dev\mock\classes\ClassBExtendsClassA;
use tests\dev\mock\classes\ClassCExtendsClassBInheirtsFromClassA;
use tests\dev\mock\classes\ClassDExtendsClassCInheirtsFromClassBAndFromClassA;
use tests\dev\mock\classes\PrivateMethods;
use tests\dev\mock\classes\PrivateProperties;
use tests\dev\mock\classes\PrivateStaticMethods;
use tests\dev\mock\classes\PrivateStaticProperties;
use tests\dev\mock\classes\ProtectedMethods;
use tests\dev\mock\classes\ProtectedProperties;
use tests\dev\mock\classes\ProtectedStaticMethods;
use tests\dev\mock\classes\ProtectedStaticProperties;
use tests\dev\mock\classes\PublicMethods;
use tests\dev\mock\classes\PublicProperties;
use tests\dev\mock\classes\PublicStaticMethods;
use tests\dev\mock\classes\PublicStaticProperties;
use tests\dev\mock\classes\ReflectedAbstractClass;
use tests\dev\mock\classes\ReflectedBaseClass;
use tests\dev\mock\classes\ReflectedClass;
use tests\dev\mock\classes\ReflectedSubParentClass;

trait PHPUnitRandomValues
{

    /**
     * Return a string composed of a random number of randomly
     * generated characters.
     *
     * @return string
     *
     * @example
     *
     * ```
     * echo $this->randomChars();
     * // example output: rqEzm*g1vRI7!lz#-%q
     *
     * echo $this->randomChars();
     * // example output: @Lz%R+bgR#79l!mz-
     *
     * ```
     *
     */
    protected function randomChars(): string
    {
        $string = str_shuffle(
            'abcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_-=+'
        );
        try {
            $string .=
                random_bytes(random_int(1, 100)) .
                $string .
                random_bytes(random_int(1, 100));
        } catch(\Exception $e) {
        }
        return str_shuffle($string);
    }

    /**
     * Return a random float.
     *
     * @return float
     *
     * @example
     *
     * ```
     * echo strval($this->randomFloat());
     * // example output: 1029.917
     *
     * ```
     *
     */
    protected function randomFloat(): float
    {
        return floatval(
            strval(rand(-100000000000, 100000000000)) .
            '.' .
            strval(rand(0, 100000000000))
        );
    }

    /**
     * Return a random fully qualified class name, or object instance.
     *
     * @return class-string|object
     *
     * @example
     *
     * ```
     * var_dump($this->randomClassStringOrObjectInstance);
     *
     * // example output:
     * string(8) "stdClass"
     *
     * ```
     *
     */
    protected function randomClassStringOrObjectInstance(): string|object
    {
        $classStringsAndObjects = [
            $this->randomObjectInstance(),
            stdClass::class,
            ClassABaseClass::class,
            ClassBExtendsClassA::class,
            ClassCExtendsClassBInheirtsFromClassA::class,
            ClassDExtendsClassCInheirtsFromClassBAndFromClassA::class,
            PrivateMethods::class,
            PrivateProperties::class,
            PrivateStaticMethods::class,
            PrivateStaticProperties::class,
            ProtectedMethods::class,
            ProtectedProperties::class,
            ProtectedStaticMethods::class,
            ProtectedStaticProperties::class,
            PublicMethods::class,
            PublicProperties::class,
            PublicStaticMethods::class,
            PublicStaticProperties::class,
            ReflectedAbstractClass::class,
            ReflectedBaseClass::class,
            ReflectedClass::class,
            ReflectedSubParentClass::class,
        ];
        return $classStringsAndObjects[
            array_rand($classStringsAndObjects)
        ];
    }

    /**
     * Return a random object instance.
     *
     * @return object
     *
     * @example
     *
     * ```
     * var_dump(
     *     $this->randomClassStringOrObjectInstance()::class
     * );
     *
     * // example output:
     * object(stdClass)#1 (0) {
     * }
     *
     * ```
     *
     */
    protected function randomObjectInstance(): object
    {
        $objects = [
            new stdClass(),
            new ClassABaseClass(),
            new ClassBExtendsClassA(),
            new ClassCExtendsClassBInheirtsFromClassA(),
            new ClassDExtendsClassCInheirtsFromClassBAndFromClassA(),
            new PrivateMethods(),
            new PrivateProperties(),
            new PrivateStaticMethods(),
            new PrivateStaticProperties(),
            new ProtectedMethods(),
            new ProtectedProperties(),
            new ProtectedStaticMethods(),
            new ProtectedStaticProperties(),
            new PublicMethods(),
            new PublicProperties(),
            new PublicStaticMethods(),
            new PublicStaticProperties(),
            new ReflectedBaseClass(),
            new ReflectedClass(),
            new ReflectedSubParentClass(),
        ];
        return $objects[
            array_rand($objects)
        ];
    }

}

