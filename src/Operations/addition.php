<?php

namespace CalculatorViaClosure\Operations;

return function (...$arguments) {
    if (count($arguments) === 1) {
        return $arguments[0];
    }

    return array_reduce($arguments, function ($acc, $v) {
        return $acc + $v;
    }, 0);
};
