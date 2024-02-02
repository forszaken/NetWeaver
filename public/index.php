<?php

declare(strict_types=1);

use NetWeaver\Http\Message\Response;
use NetWeaver\Http\Message\ServerRequest;

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
        return new Response(400);
    }

    $lang = detectLang($request, 'en');

    $response = (new Response())
        ->withHeader('Content-Type', 'text/plain; charset=utf-8');

    $response->getBody()->write('Hello, ' . $name . '! Your lang is ' . $lang);

    return $response;
}

### Grabbing

$request = createServerRequestFromGlobals();

### Running

$response = home($request);

### Postprocessing

$response = $response->withHeader('X-Frame-Options', 'DENY');

### Sending

emitResponseToSapi($response);
