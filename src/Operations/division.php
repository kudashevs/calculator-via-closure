<?php

namespace CalculatorViaClosure\Operations;

return function (...$numbers) {
    if (in_array(0, $numbers, false)) {
        throw new \DivisionByZeroError('Cannot divide by zero.');
    }

    $start = array_shift($numbers);

    return array_reduce($numbers, function ($carry, $value) {
        return $carry / $value;
    }, $start);
};
