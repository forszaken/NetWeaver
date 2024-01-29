<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$name = $_GET['name'] ?? 'Guest';

if (!is_string($name)) {
    exit;
}

header('Content-Type: text/plain; charset=utf-8');

echo 'Hello, ' . $name . '!';
