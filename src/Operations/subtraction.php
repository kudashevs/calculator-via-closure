<?php

namespace CalculatorViaClosure\Operations;

return function (...$numbers) {
    return array_shift($numbers) - array_sum($numbers);
};
