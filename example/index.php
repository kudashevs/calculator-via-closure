<?php

namespace CalculatorViaClosure;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    $addition = calculator($opaddition);
    echo $addition(1, 2) . PHP_EOL; // results in 3
} catch (\Throwable $e) {
    echo explainException($e);
}

try {
    $division = calculator($opdivision);
    echo $division(1, 2) . PHP_EOL; // results in 0.5
} catch (\Throwable $e) {
    echo explainException($e);
}

function explainException(\Throwable $exception): string
{
    return sprintf(
        '%s: Something really went wrong with a message: %s' . PHP_EOL,
        get_class($exception),
        $exception->getMessage(),
    );
}
