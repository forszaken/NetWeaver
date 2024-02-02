<?php

declare(strict_types=1);

namespace NetWeaver\Http;

use NetWeaver\Http\Message\Response;

function emitResponseToSapi(Response $response): void
{
    http_response_code($response->getStatusCode());


    foreach ($response->getHeaders() as $name => $values) {
        foreach ($values as $value) {
            header($name . ': ' . $value, false);
        }
    }

    $body = $response->getBody();
    $body->rewind();

    do {
        $content = $body->read(1024 * 8);
        echo $content;
    } while ($content !== '');
}
