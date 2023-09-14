<?php

namespace CalculatorViaClosure\Operations;

return function (...$arguments) {
    return array_shift($arguments) - array_sum($arguments);
};
