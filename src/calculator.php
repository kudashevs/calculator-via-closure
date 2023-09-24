<?php

namespace CalculatorViaClosure;

use CalculatorViaClosure\Exceptions\InvalidCallable;
use CalculatorViaClosure\Exceptions\InvalidClosureArgument;

require_once __DIR__ . '/../vendor/autoload.php';

function calculator(callable $operation)
{
    checkValidCallable($operation);

    // This anonymous function is a Closure that encloses a provided callable $operation argument
    // inside it and invokes this callable with provided arguments any time the Closure is called.
    return function (...$numbers) use ($operation) {
        checkValidArguments($numbers);

        return $operation(...$numbers);
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
        throw new InvalidClosureArgument('Please provide at least one argument.');
    }

    foreach ($arguments as $argument) {
        if (!is_numeric($argument)) {
            throw new InvalidClosureArgument('Only numeric arguments are allowed.');
        }
    }
}
