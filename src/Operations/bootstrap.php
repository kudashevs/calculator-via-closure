<?php

$requiredFiles = retrieveRequiredFiles();
loadRequiredFiles($requiredFiles);

function retrieveRequiredFiles(): array
{
    $currentFile = __FILE__;
    $files = glob(__DIR__ . '/*.php');

    return array_filter(
        $files,
        function ($file) use ($currentFile) {
            return $file !== $currentFile;
        }
    );
}

function loadRequiredFiles(array $files): void
{
    array_map(function ($file) {
        require_once $file;
    }, $files);
}
