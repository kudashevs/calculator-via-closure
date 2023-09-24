<?php

namespace CalculatorViaClosure\Operations;

return function (...$numbers) {
    return array_sum($numbers);
};
