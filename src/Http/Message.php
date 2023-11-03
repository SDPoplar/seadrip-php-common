<?php
namespace SeaDrip\Http;

use Psr\Http\Message\{MessageInterface, StreamInterface};

class Message implements MessageInterface
{
    public function __construct(string $protocolVersion, StreamInterface $body, array $headers)
    {
        $this->protocol_version = $protocolVersion;
        $this->body = $body;
        $this->headers = $headers;
    }

    public function getProtocolVersion(): string
    {
        return $this->protocol_version;
    }

    public function withProtocolVersion(string $version): MessageInterface
    {
        $ret = clone $this;
        $ret->protocol_version = $version;
        return $ret;
    }

    public function hasHeader(string $name): bool
    {
        return array_key_exists(strtolower($name), $this->headers);
    }

    public function getHeaderLine(string $name): string
    {
        $line = $this->headers[strtolower($name)] ?? null;
        return $line ? implode(', ', $line) : '';
    }

    public function getHeader(string $name): array
    {
        return $this->headers[strtolower($name)] ?? [];
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function withAddedHeader(string $name, $value): MessageInterface
    {
        $ci_name = strtolower($name);
        $ret = clone $this;
        $ret->headers[$ci_name] = array_merge($ret->headers[$ci_name] ?? [], is_string($value) ? [$value] : $value);
        return $ret;
    }

    public function withHeader(string $name, $value): MessageInterface
    {
        $ret = clone $this;
        $ret->headers[strtolower($name)] = is_string($value) ? [$value] : $value;
        return $ret;
    }

    public function withoutHeader(string $name): MessageInterface
    {
        $ret = clone $this;
        unset($ret->headers[strtolower($name)]);
        return $ret;
    }

    public function getBody(): StreamInterface
    {
        return $this->body;
    }

    public function withBody(StreamInterface $body): MessageInterface
    {
        $ret = clone $this;
        $ret->body = $body;
        return $ret;
    }

    protected string $protocol_version;
    protected StreamInterface $body;

    protected array $headers;
}
