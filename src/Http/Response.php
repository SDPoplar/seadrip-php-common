<?php
namespace SeaDrip\Http;

use Psr\Http\Message\ResponseInterface;

class Response extends Message implements \Psr\Http\Message\ResponseInterface
{
    public function withStatus(int $code, string $reasonPhrase = ''): ResponseInterface
    {
        $ret = clone $this;
        $ret->status_code = $code;
        $ret->reason_phrase = $reasonPhrase;
        return $ret;
    }

    public function getStatusCode(): int
    {
        return $this->status_code;
    }

    public function getReasonPhrase(): string
    {
        return $this->reason_phrase;
    }

    protected readonly int $status_code;
    protected readonly string $reason_phrase;
}
