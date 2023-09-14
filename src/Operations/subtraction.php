<?php

namespace CalculatorViaClosure\Operations;

return function (...$arguments) {
    $firstArgument = array_shift($arguments);

    return array_reduce($arguments, function ($acc, $v) {
        return $acc - $v;
    }, $firstArgument);
};
