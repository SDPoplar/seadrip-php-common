<?php
namespace SeaDrip\Http;

use Psr\Http\Message\{MessageInterface, StreamInterface};

class Message implements MessageInterface
{
    public function getProtocolVersion(): string
    {
        return $this->protocol_version;
    }

    public function withProtocolVersion(string $version): MessageInterface
    {
        return (new static())
            ->initProtocolVersion($version)
            ->initBody($this->body)
            ->initHeaders(...$this->headers);
    }

    public function hasHeader(string $name): bool
    {
        return array_key_exists(strtolower($name), $this->headers);
    }

    public function getHeaderLine(string $name): string
    {
        $line = $this->headers[strtolower($name)] ?? null;
        return $line ? ''.$line : '';
    }

    public function getHeader(string $name): array
    {
        $line = (fn($ins): ?HeaderItem => $ins)($this->headers[strtolower($name)] ?? null);
        return $line ? $line->values : [];
    }

    public function getHeaders(): array
    {
        $ret = [];
        foreach ($this->headers as $line) {
            $l = (fn($ins): Headers\Line => $ins)($line);
            $ret[$l->field] = $l->toArray();
        }
        return $ret;
    }

    public function withAddedHeader(string $name, $value): MessageInterface
    {
        $ci_name = strtolower($name);
        $h = $this->headers;
        $val_arr = is_string($value) ? [$value] : $value;
        $target_item = (fn($ins): HeaderItem => $ins ?: new HeaderItem($name))($h[$ci_name] ?? null);
        $h[$ci_name] = $target_item->merge(...$val_arr);
        return (new static())
            ->initProtocolVersion($this->protocol_version)
            ->initBody($this->body)
            ->initHeaders(...$h);
    }

    public function withHeader(string $name, $value): MessageInterface
    {
        $val_arr = is_string($value) ? [$value] : $value;
        return (new static())
            ->initProtocolVersion($this->protocol_version)
            ->initBody($this->body)
            ->initHeaders(
                new HeaderItem($name, ...$val_arr),
                ...array_values($this->headers),    
            );
    }

    public function withoutHeader(string $name): MessageInterface
    {
        $new_headers = $this->headers;
        unset($new_headers[strtolower($name)]);
        return (new static())
            ->initProtocolVersion($this->protocol_version)
            ->initBody($this->body)
            ->initHeaders(...$new_headers);
    }

    public function getBody(): StreamInterface
    {
        return $this->body;
    }

    public function withBody(StreamInterface $body): MessageInterface
    {
        return (new static())
            ->initProtocolVersion($this->protocol_version)
            ->initBody($body)
            ->initHeaders(...$this->headers);
    }

    protected static function fork(self $from, string $target_class): static
    {
        $ins = (fn(): self => new $target_class())();
        return $ins
            ->initProtocolVersion($from->protocol_version)
            ->initBody($from->body)
            ->initHeaders(...$from->headers);
    }

    protected function &initProtocolVersion(string $version): static
    {
        $this->protocol_version = $version;
        return $this;
    }

    protected function &initBody(StreamInterface $body): static
    {
        $this->body = $body;
        return $this;
    }

    protected function &initHeaders(HeaderItem ...$header_items): static
    {
        $hi = [];
        foreach ($header_items as $i) {
            $hi[strtolower($i->name)] = $i;
        }
        $this->headers = $hi;
        return $this;
    }

    protected readonly string $protocol_version;
    protected readonly StreamInterface $body;

    protected readonly array $headers;
}
