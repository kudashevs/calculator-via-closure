<?php
namespace CalculatorViaClosure;

$additionFunction = function ($a, $b) {
    return $a + $b;
};

$substractionFunction = function ($a, $b)
{
    return $a - $b;
};

$multiplicationFunction = function ($a, $b)
{
    return $a * $b;
};

$divisionFunction = function ($a, $b)
{
    if ($b === 0) {
        throw new \DivisionByZeroError('Argument must no be zero.');
    }

    return $a / $b;
};