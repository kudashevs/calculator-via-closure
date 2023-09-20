<?php

namespace CalculatorViaClosure\Operations;

return function (...$arguments) {
    if (in_array(0, $arguments, true)) {
        return 0;
    }

    $start = array_shift($arguments);

    return array_reduce($arguments, function ($carry, $value) {
        return $carry * $value;
    }, $start);
};
