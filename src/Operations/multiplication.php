<?php

namespace CalculatorViaClosure\Operations;

return function (...$numbers) {
    if (in_array(0, $numbers, true)) {
        return 0;
    }

    $start = array_shift($numbers);

    return array_reduce($numbers, function ($carry, $value) {
        return $carry * $value;
    }, $start);
};
