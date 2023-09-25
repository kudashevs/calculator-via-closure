<?php

declare(strict_types=1);

namespace CalculatorViaClosure\Operations;

use CalculatorViaClosure\Exceptions\InvalidOperationArgument;

return function (...$numbers) {
    if (in_array(0, $numbers, false)) {
        throw new InvalidOperationArgument('Cannot divide by zero.');
    }

    $start = array_shift($numbers);

    return array_reduce($numbers, function ($carry, $value) {
        return $carry / $value;
    }, $start);
};
