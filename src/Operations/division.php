<?php

namespace CalculatorViaClosure\Operations;

global $division;

$division = function (...$args) {
    if (in_array(0, $args, false)) {
        throw new \DivisionByZeroError('Cannot divide by zero.');
    }

    $start = array_shift($args);

    return array_reduce($args, function ($acc, $v) {
        return $acc / $v;
    }, $start);
};
