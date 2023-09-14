<?php

namespace CalculatorViaClosure;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $calculate = calculator($addition);
    echo $calculate(1, 2) . PHP_EOL; // 3
} catch (\Exception $e) {
    error_log('PHP Exception: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine() . '', 0);
    echo $e->getMessage() . PHP_EOL;
}

try {
    $calculate = calculator($division);
    echo $calculate(1, 2) . PHP_EOL; // 0.5
} catch (\DivisionByZeroError $e) {
    error_log('PHP Exception: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine() . '', 0);
    echo 'Division failed due to division by zero error!' . PHP_EOL;
} catch (\InvalidCallable $e) {
    error_log('PHP Exception: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine() . '', 0);
    echo 'A wrong callable was provided to the function.' . PHP_EOL;
} catch (\ArgumentCountError $e) {
    error_log('PHP Exception: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine() . '', 0);
    echo 'Wrong arguments count passed to Closure!' . PHP_EOL;
} catch (\TypeError $e) {
    error_log('PHP Exception: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine() . '', 0);
    echo 'Wrong arguments type passed to Closure!' . PHP_EOL;
}
