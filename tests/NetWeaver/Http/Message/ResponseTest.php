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
                'Header-1' => 'value-1',
                'Header-2' => 'value-2',
            ]
        );

        self::assertEquals($body, $response->getBody());
        self::assertEquals($status, $response->getStatusCode());
        self::assertEquals($headers, $response->getHeaders());
    }

    public function testHeader(): void
    {
        $response = new Response(
            200,
            new Stream(fopen('php://memory', 'r+')),
            []
        );

        $response = $response
            ->setHeader('Header-1', 'value-1')
            ->setHeader('Header-2', 'value-2');

        self::assertEquals([
            'Header-1' => 'value-1',
            'Header-2' => 'value-2',
        ], $response->getHeaders());
    }
}
