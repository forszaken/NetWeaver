<?php

declare(strict_types=1);

namespace NetWeaver\Http\Message;

use General\Http\Message\StreamFactoryInterface;
use Laminas\Diactoros\Stream;
use Psr\Http\Message\StreamInterface;

class DiactorosStreamFactory implements StreamFactoryInterface
{
    public function createStream(string $content = ''): StreamInterface
    {
        $resource = fopen('php://temp', 'r+');
        fwrite($resource, $content);
        rewind($resource);

        return new Stream($resource);
    }

    /**
     * @param resource $resource
     */
    public function createStreamFromResource(mixed $resource): StreamInterface
    {
        return new Stream($resource);
    }
}
