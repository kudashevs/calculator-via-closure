<?php

namespace CalculatorViaClosure;

function Calculator(\Closure $operation)
{
    $reflection = new \ReflectionFunction($operation);

    if ($reflection->getNumberOfParameters() < 1) {
        throw new \InvalidArgumentException('Arguments cannot be empty.');
    }

    /*
     * This function will store passed Closure function with mathematical operations
     * in $operation variable and will use it any time the Closure is invoked
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
