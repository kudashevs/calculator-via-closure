<?php

namespace CalculatorViaClosure\Operations;

global $substraction;

$substraction = function (...$arguments) {
    $firstArgument = array_shift($arguments);

    return array_reduce($arguments, function ($acc, $v) {
        return $acc - $v;
    }, $firstArgument);
};
