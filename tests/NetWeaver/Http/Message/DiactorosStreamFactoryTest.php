<?php

declare(strict_types=1);

namespace Test\NetWeaver\Http\Message;

use NetWeaver\Http\Message\DiactorosStreamFactory;
use PHPUnit\Framework\TestCase;

class DiactorosStreamFactoryTest extends TestCase
{
    public function testDefault(): void
    {
        $factory = new DiactorosStreamFactory();

        $stream = $factory->createStream();

        self::assertEquals('', $stream->getContents());
    }

    public function testContent(): void
    {
        $factory = new DiactorosStreamFactory();

        $stream = $factory->createStream($content = 'Content');

        self::assertEquals($content, $stream->getContents());
    }
}
