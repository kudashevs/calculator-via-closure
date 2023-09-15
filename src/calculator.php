<?php

namespace CalculatorViaClosure;

use CalculatorViaClosure\Exceptions\InvalidCallable;
use CalculatorViaClosure\Exceptions\InvalidClosureArgument;

require_once __DIR__ . '/../vendor/autoload.php';

function calculator(callable $operation)
{
    checkValidCallable($operation);

    // This anonymous function is a Closure that encloses a provided callable $operation argument
    // and uses it on the passed arguments as a math operation any time the Closure is invoked.
    return function (...$arguments) use ($operation) {
        checkValidArguments($arguments);

        return $operation(...$arguments);
    };
}

function checkValidCallable(callable $operation): void
{
    $reflection = new \ReflectionFunction($operation);

    if ($reflection->getNumberOfParameters() < 1) {
        throw new InvalidCallable('A callable must accept at least one argument.');
    }
}

function checkValidArguments(array $arguments): void
{
    if (empty($arguments)) {
        throw new InvalidClosureArgument('The arguments cannot be empty.');
    }

    foreach ($arguments as $arg) {
        if (!is_int($arg) && !is_float($arg)) {
            throw new InvalidClosureArgument('Only numeric arguments are allowed.');
        }
    }
}
