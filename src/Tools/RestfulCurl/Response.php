<?php
namespace SeaDrip\Tools\RestfulCurl;

class Response
{
    public function __construct(
        public readonly int $status,
        public readonly string $content,
    ) {}

    public function isSuccess() : bool
    {
        return in_array($this->status, [200, 204]);
    }
}
