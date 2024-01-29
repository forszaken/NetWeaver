<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$name = $_GET['name'] ?? 'Guest';

if (!is_string($name)) {
    http_response_code(400);
    exit;
}

header('Content-Type: text/plain; charset=utf-8');
header('X-Frame-Options: DENY');

echo 'Hello, ' . $name . '!';
