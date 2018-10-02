<?php
namespace CalculatorViaClosure;

function CalculatorGenerator(\Closure $operator)
{
    $argumentsNumber = 2;

    $reflection = new \ReflectionFunction($operator);
    if ($reflection->getNumberOfRequiredParameters() !== $argumentsNumber) {
        throw new ClosureException('You must pass only Closure with ' . $argumentsNumber . ' arguments.');
    }

    // this function will store passed Closure function in $operator variable and
    // use it as math operator any time it will be called as a function variable
    return function ($a, $b) use ($operator, $argumentsNumber) {
        if (count(func_get_args()) !== $argumentsNumber) {
            throw new \ArgumentCountError('You must pass only ' . $argumentsNumber . ' arguments.');
        }

        if (!is_numeric($a) || !is_numeric($b)) {
            throw new \TypeError('Operand must be numeric.');
        }

        return $operator($a, $b);
    };
};