<?php

declare(strict_types=1);

namespace Test\NetWeaver\Http\Message;

use NetWeaver\Http\Message\Response;
use NetWeaver\Http\Message\Stream;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    public function testCreate(): void
    {
        $response = new Response(
            $status = 200,
            $body = new Stream(fopen('php://memory', 'r+')),
            $headers = [
                'Header-1' => ['value-1'],
                'Header-2' => ['value-2'],
            ]
        );

        self::assertEquals($body, $response->getBody());
        self::assertEquals($status, $response->getStatusCode());
        self::assertEquals($headers, $response->getHeaders());
    }

    public function testHeaders(): void
    {
        $response = (new Response())
            ->withHeader('X-Header-1', 'value-1')
            ->withHeader('X-Header-2', 'value-2')
            ->withHeader('X-Header-1', 'value-3')
            ->withHeader('X-Header-Multiple', 'multiple-1')
            ->withAddedHeader('X-Header-Multiple', 'multiple-2');

        self::assertEquals(['value-2'], $response->getHeader('X-Header-2'));

        self::assertEquals([
            'X-Header-1' => ['value-3'],
            'X-Header-2' => ['value-2'],
            'X-Header-Multiple' => ['multiple-1', 'multiple-2'],
        ], $response->getHeaders());
    }
}
