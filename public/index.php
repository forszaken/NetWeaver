<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

$name = $_GET['name'] ?? 'Guest';

if (!is_string($name)) {
    exit;
}

echo '<h1>Hello, ' . htmlspecialchars($name) . '!</h1>';
