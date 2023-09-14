<?php

$operationFiles = retrieveOperationFiles();
registerOperations($operationFiles);

function retrieveOperationFiles(): array
{
    $allFiles = scandir(__DIR__);

    return array_map(function ($file) {
        return __DIR__ . DIRECTORY_SEPARATOR . $file;
    }, array_filter($allFiles, function ($file) {
        [$name, $extension] = explode('.', $file);

        return $extension === 'php'
            && $name !== ''
            && $name !== 'bootstrap';
    });
}

function registerOperations(array $files): void
{
    array_map(function ($file) {
        $operationName = pathinfo($file)['filename'];
        registerOperation($operationName, $file);
    }, $files);
}

function registerOperation(string $name, string $file)
{
    if (!array_key_exists($name, $GLOBALS)) {
        $GLOBALS[$name] = require $file;
    }
}
