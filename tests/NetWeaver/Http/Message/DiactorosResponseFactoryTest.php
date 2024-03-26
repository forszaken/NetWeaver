<?php

declare(strict_types=1);

namespace Test\NetWeaver\Http\Message;

use NetWeaver\Http\Message\DiactorosResponseFactory;
use PHPUnit\Framework\TestCase;

class DiactorosResponseFactoryTest extends TestCase
{
    public function testDefault(): void
    {
        $factory = new DiactorosResponseFactory();

        $response = $factory->createResponse();

        self::assertEquals(200, $response->getStatusCode());
    }

    public function testCode(): void
    {
        $factory = new DiactorosResponseFactory();

        $response = $factory->createResponse(302);

        self::assertEquals(302, $response->getStatusCode());
    }
}
