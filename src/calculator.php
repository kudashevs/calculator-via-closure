<?php

namespace CalculatorViaClosure;

use CalculatorViaClosure\Exceptions\InvalidCallable;

require_once __DIR__ . '/../vendor/autoload.php';

function calculator(callable $operation)
{
    checkValidCallable($operation);

    /*
     * This anonymous function is a Closure that encloses a provided callable $operation argument
     * and uses it on the passed arguments as a math operation any time the Closure is invoked.
     */
    return function (...$args) use ($operation) {
        if (empty($args)) {
            throw new \InvalidArgumentException('Arguments cannot be empty.');
        }

        foreach ($args as $arg) {
            if (!is_int($arg) && !is_float($arg)) {
                throw new \InvalidArgumentException('Arguments must be numeric.');
            }
        }

        return $operation(...$args);
    };
}

function checkValidCallable(callable $operation): void
{
    $reflection = new \ReflectionFunction($operation);

    if ($reflection->getNumberOfParameters() < 1) {
        throw new InvalidCallable('A callable must accept at least one argument.');
    }
}
