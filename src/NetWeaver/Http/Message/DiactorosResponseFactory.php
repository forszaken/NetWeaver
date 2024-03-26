<?php

declare(strict_types=1);

namespace NetWeaver\Http\Message;

use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;

class DiactorosResponseFactory
{
    public function createResponse(int $code = 200): ResponseInterface
    {
        return new Response((new DiactorosStreamFactory())->createStream(), $code, []);
    }
}
