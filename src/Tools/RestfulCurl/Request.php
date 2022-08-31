<?php
namespace SeaDrip\Tools\RestfulCurl;

use \SeaDrip\Enums\HttpMethods as Methods;

class Request
{
    public function __construct(
        public readonly Methods $method,
        public readonly string $url,
        public readonly array|string $fields = '',
        public readonly array $headers = [],
    ) {}

    public static function get(string $url, array|string $fields = '', array $headers = []): self
    {
        return new self(Methods::Get, $url, $fields, $headers);
    }

    public static function post(string $url, array|string $fields = '', array $headers = []): self
    {
        return new self(Methods::Post, $url, $fields, $headers);
    }

    public static function head(string $url, array|string $fields = '', array $headers = []): self
    {
        return new self(Methods::Head, $url, $fields, $headers);
    }

    public static function options(string $url, array|string $fields = '', array $headers = []): self
    {
        return new self(Methods::Options, $url, $fields, $headers);
    }

    public static function put(string $url, array|string $fields = '', array $headers = []): self
    {
        return new self(Methods::Put, $url, $fields, $headers);
    }

    public static function patch(string $url, array|string $fields = '', array $headers = []): self
    {
        return new self(Methods::Patch, $url, $fields, $headers);
    }

    public static function delete(string $url, array|string $fields = '', array $headers = []): self
    {
        return new self(Methods::Delete, $url, $fields, $headers);
    }

    public static function trace(string $url, array|string $fields = '', array $headers = []): self
    {
        return new self(Methods::Trace, $url, $fields, $headers);
    }

    public static function connect(string $url, array|string $fields = '', array $headers = []): self
    {
        return new self(Methods::Connect, $url, $fields, $headers);
    }
}

