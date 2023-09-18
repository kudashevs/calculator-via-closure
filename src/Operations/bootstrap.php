<?php

const GLOBAL_PREFIX = 'op';

$operationFiles = retrieveOperationFiles();
registerOperationsGlobally($operationFiles);

/**
 * @return string[]
 */
function retrieveOperationFiles(): array
{
    $allFiles = scandir(__DIR__);

    return array_filter($allFiles, function ($file) {
        [$name, $extension] = explode('.', $file);

        return $extension === 'php'
            && $name !== ''
            && $name !== 'bootstrap';
    });
}

function registerOperationsGlobally(array $files): void
{
    array_map(static function ($file) {
        $operationName = GLOBAL_PREFIX . basename($file, '.php');
        registerOperationGlobally($operationName, $file);
    }, $files);
}

function registerOperationGlobally(string $name, string $file): void
{
    $fullPath = __DIR__ . DIRECTORY_SEPARATOR . $file;

    if (!array_key_exists($name, $GLOBALS)) {
        $GLOBALS[$name] = require $fullPath;
    }
}
