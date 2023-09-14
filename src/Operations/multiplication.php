<?php

namespace CalculatorViaClosure\Operations;

global $multiplication;

$multiplication = function (...$args) {
    if (in_array(0, $args, true)) {
        return 0;
    }

    $start = array_shift($args);

    return array_reduce($args, function ($acc, $v) {
        return $acc * $v;
    }, $start);
};
