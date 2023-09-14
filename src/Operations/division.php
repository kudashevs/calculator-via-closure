<?php

namespace CalculatorViaClosure\Operations;

global $division;

$division = function (...$arguments) {
    if (in_array(0, $arguments, false)) {
        throw new \DivisionByZeroError('Cannot divide by zero.');
    }

    $start = array_shift($arguments);

    return array_reduce($arguments, function ($acc, $v) {
        return $acc / $v;
    }, $start);
};
