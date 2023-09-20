<?php

namespace CalculatorViaClosure\Operations;

return function (...$arguments) {
    if (in_array(0, $arguments, false)) {
        throw new \DivisionByZeroError('Cannot divide by zero.');
    }

    $start = array_shift($arguments);

    return array_reduce($arguments, function ($carry, $value) {
        return $carry / $value;
    }, $start);
};
