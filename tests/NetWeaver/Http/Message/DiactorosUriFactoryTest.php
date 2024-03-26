<?php

declare(strict_types=1);

namespace Test\NetWeaver\Http\Message;

use NetWeaver\Http\Message\DiactorosUriFactory;
use PHPUnit\Framework\TestCase;

class DiactorosUriFactoryTest extends TestCase
{
    public function testDefault(): void
    {
        $factory = new DiactorosUriFactory();

        $uri = $factory->createUri($string = 'https://user:pass@test:81/home?a=2&b=3#first');

        self::assertEquals($string, (string)$uri);
    }
}
