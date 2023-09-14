<?php

namespace CalculatorViaClosure\Operations;

return function (...$arguments) {
    return array_sum($arguments);
};
