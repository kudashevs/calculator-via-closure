<?php

namespace CalculatorViaClosure\Operations;

global $addition;

$addition = function (...$args) {
    if (count($args) === 1) {
        return $args[0];
    }

    return array_reduce($args, function ($acc, $v) {
        return $acc + $v;
    }, 0);
};
