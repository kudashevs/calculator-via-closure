<?php
use function CalculatorViaClosure\CalculatorGenerator;
use CalculatorViaClosure\ClosureException;

require_once 'src/bootstrap.php';

try {
    $calculate = CalculatorGenerator($addition);
    echo $calculate(1, 2) . PHP_EOL; // 3
} catch (ClosureException $e) {
    error_log('PHP Exception: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine(). '', 0);
    echo 'Wrong Closure type passed to function!' . PHP_EOL;
} catch (\ArgumentCountError $e) {
    error_log('PHP Exception: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine() . '', 0);
    echo 'Wrong arguments count passed to Closure!' . PHP_EOL;
} catch (\TypeError $e) {
    error_log('PHP Exception: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine() . '', 0);
    echo 'Wrong arguments type passed to Closure!' . PHP_EOL;
}


try {
    $calculate = CalculatorGenerator($division);
    echo $calculate(1, 2) . PHP_EOL; // 0.5
} catch (\DivisionByZeroError $e) {
    error_log('PHP Exception: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine(). '', 0);
    echo 'Division failed due to division by zero error!' . PHP_EOL;
} catch (ClosureException $e) {
    error_log('PHP Exception: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine(). '', 0);
    echo 'Wrong Closure type passed to function!' . PHP_EOL;
} catch (\ArgumentCountError $e) {
    error_log('PHP Exception: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine() . '', 0);
    echo 'Wrong arguments count passed to Closure!' . PHP_EOL;
} catch (\TypeError $e) {
    error_log('PHP Exception: ' . $e->getMessage() . ' in file ' . $e->getFile() . ' on line ' . $e->getLine() . '', 0);
    echo 'Wrong arguments type passed to Closure!' . PHP_EOL;
}