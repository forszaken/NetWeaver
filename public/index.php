<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

http_response_code(500);

function detectLang(string $default): string
{
    if (!empty($_GET['lang']) && is_string($_GET['lang'])) {
        return $_GET['lang'];
    }
    return $default;
}

$name = $_GET['name'] ?? 'Guest';

if (!is_string($name)) {
    http_response_code(400);
    exit;
}

$lang = detectLang('en');

http_response_code(200);
header('Content-Type: text/plain; charset=utf-8');
header('X-Frame-Options: DENY');

echo 'Hello, ' . $name . '! Your lang is ' . $lang;
