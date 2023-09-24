<?php

declare(strict_types=1);

namespace CalculatorViaClosure\Operations;

return function (...$numbers) {
    return array_shift($numbers) - array_sum($numbers);
};
