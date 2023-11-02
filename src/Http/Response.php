<?php
namespace SeaDrip\Http;

use Psr\Http\Message\ResponseInterface;

class Response extends Message implements \Psr\Http\Message\ResponseInterface
{
    public function withStatus(int $code, string $reasonPhrase = ''): ResponseInterface
    {
        return (new static())->initMessage($this)->initStatusCode($code)->initReasonPhrase($reasonPhrase);
    }

    public function getStatusCode(): int
    {
        return $this->status_code;
    }

    public function getReasonPhrase(): string
    {
        return $this->reason_phrase;
    }

    protected function &initResponse(Response $from): static
    {
        return $this->initMessage($from)
            ->initStatusCode($from->status_code)
            ->initReasonPhrase($from->reason_phrase);
    }

    protected function &initStatusCode(int $code): static
    {
        $this->status_code = $code;
        return $this;
    }

    protected function &initReasonPhrase(string $reasonPhrase = ''): static
    {
        $this->reason_phrase = $reasonPhrase;
        return $this;
    }

    protected readonly int $status_code;
    protected readonly string $reason_phrase;
}
