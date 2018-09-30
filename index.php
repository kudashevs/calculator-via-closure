<?php
namespace CalculatorViaClosure;

require_once 'src/bootstrap.php';

$addition = CalculatorGenerator($addition);

echo $addition(1, 2) . PHP_EOL; // 3

$division = CalculatorGenerator($division);

echo $division(1, 2) . PHP_EOL; // 0.5

