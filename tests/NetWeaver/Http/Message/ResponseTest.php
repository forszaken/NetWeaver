<?php

declare(strict_types=1);

namespace Test\NetWeaver\Http\Message;

use NetWeaver\Http\Message\Response;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    public function testCreate(): void
    {
        $response = new Response(
            $status = 200,
            $body = 'Body',
            $headers = [
                'Header-1' => 'value-1',
                'Header-2' => 'value-2',
            ]
        );

        self::assertEquals($body, $response->getBody());
        self::assertEquals($status, $response->getStatusCode());
        self::assertEquals($headers, $response->getHeaders());
    }
}
