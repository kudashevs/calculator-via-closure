<?php

declare(strict_types=1);

namespace CalculatorViaClosure\Operations;

use CalculatorViaClosure\Exceptions\InvalidClosureArgument;

return function (...$numbers) {
    if (in_array(0, $numbers, false)) {
        throw new InvalidClosureArgument('Cannot divide by zero.');
    }

    $start = array_shift($numbers);

    return array_reduce($numbers, function ($carry, $value) {
        return $carry / $value;
    }, $start);
};
