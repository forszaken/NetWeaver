<?php

declare(strict_types=1);

namespace NetWeaver\Http\Message;

use Laminas\Diactoros\Uri;
use Psr\Http\Message\UriInterface;

class DiactorosUriFactory
{
    public function createUri(string $uri = ''): UriInterface
    {
        return new Uri($uri);
    }
}