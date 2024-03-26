<?php

declare(strict_types=1);

namespace NetWeaver\Http\Message;

use Laminas\Diactoros\Stream;
use Psr\Http\Message\StreamInterface;

class DiactorosStreamFactory
{
    public function createStream(string $content = ''): StreamInterface
    {
        $resource = fopen('php://temp', 'r+');
        fwrite($resource, $content);
        rewind($resource);

        return new Stream($resource);
    }

    /**
     * @param resource|string $resource
     */
    public function createStreamFromResource(mixed $resource): StreamInterface
    {
        return new Stream($resource);
    }
}
