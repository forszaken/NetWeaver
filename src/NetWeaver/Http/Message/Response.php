<?php

declare(strict_types=1);

namespace NetWeaver\Http\Message;

class Response
{
    private int $statusCode;
    private Stream $body;
    private array $headers;

    public function __construct(int $statusCode, Stream $body, array $headers)
    {
        $this->statusCode = $statusCode;
        $this->body = $body;
        $this->headers = $headers;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeader(string $name, string $value): void
    {
        $this->headers[$name] = $value;
    }

    public function getBody(): Stream
    {
        return $this->body;
    }
}
