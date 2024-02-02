<?php

declare(strict_types=1);

use NetWeaver\Http\Message\Response;
use NetWeaver\Http\Message\ServerRequest;
use NetWeaver\Http\Message\Stream;

use function App\detectLang;
use function NetWeaver\Http\createServerRequestFromGlobals;
use function NetWeaver\Http\emitResponseToSapi;

http_response_code(500);

/** @psalm-suppress MissingFile */
require __DIR__ . '/../vendor/autoload.php';

### Page

function home(ServerRequest $request): Response
{
    $name = $request->getQueryParams()['name'] ?? 'Guest';

    if (!is_string($name)) {
        return new Response(
            400,
            new Stream(fopen('php://memory', 'r+')),
            []
        );
    }

    $lang = detectLang($request, 'en');

    $body = new Stream(fopen('php://memory', 'r+'));
    $body->write('Hello, ' . $name . '! Your lang is ' . $lang);

    return new Response(
        200,
        $body,
        [
            'Content-Type' => 'text/plain; charset=utf-8',
        ]
    );
}

### Grabbing

$request = createServerRequestFromGlobals();

### Running

$response = home($request);

### Postprocessing

$response = $response->setHeader('X-Frame-Options', 'DENY');

### Sending

emitResponseToSapi($response);
