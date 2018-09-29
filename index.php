<?php
namespace CalculatorViaClosure;

require_once 'src/bootstrap.php';

$addition = CalculatorGenerator($additionFunction);

echo $addition(1, 2) . PHP_EOL; // 3

$division = CalculatorGenerator($divisionFunction);

echo $division(1, 2) . PHP_EOL; // 0.5

