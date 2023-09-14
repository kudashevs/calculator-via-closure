<?php

$operationFiles = retrieveOperationFiles();
registerOperationsGlobally($operationFiles);

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

function registerOperationsGlobally(array $files): void
{
    array_map(function ($file) {
        $operationName = pathinfo($file)['filename'];
        registerOperationGlobally($operationName, $file);
    }, $files);
}

function registerOperationGlobally(string $name, string $file)
{
    if (!array_key_exists($name, $GLOBALS)) {
        $GLOBALS[$name] = require $file;
    }
}
