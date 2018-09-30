<?php
namespace CalculatorViaClosure;

function CalculatorGenerator(\Closure $operator)
{
    $reflection = new \ReflectionFunction($operator);
    if ($reflection->getNumberOfRequiredParameters() !== 2) {
        throw new \Exception('Wrong Closure type passed');
    }

    // this function will store passed Closure function in $operator variable and
    // use it as math operator any time it will be called as a function variable
    return function ($a, $b) use ($operator) {
        if (!is_numeric($a) || !is_numeric($b)) {
            throw new \TypeError('Operand must be numeric.');
        }

        return $operator($a, $b);
    };
};