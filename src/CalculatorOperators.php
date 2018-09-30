<?php
namespace CalculatorViaClosure;

$addition = function ($a, $b) {
    return $a + $b;
};

$substraction = function ($a, $b)
{
    return $a - $b;
};

$multiplication = function ($a, $b)
{
    return $a * $b;
};

$division = function ($a, $b)
{
    if ($b == 0) {
        throw new \DivisionByZeroError('Argument must no be zero.');
    }

    return $a / $b;
};

$modulus = function ($a, $b) {
    if ($b == 0) {
        throw new \DivisionByZeroError('Argument must no be zero.');
    }

    return $a % $b;
};