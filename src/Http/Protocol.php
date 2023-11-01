<?php
namespace SeaDrip\Http;

enum Protocol: string
{
    case V0_9   = 'HTTP/0.9';
    case V1_0   = 'HTTP/1.0';
    case V1_1   = 'HTTP/1.1';
    case V2     = 'HTTP/2';

    public function allowedMethods(): array
    {
        return match($this) {
            self::V0_9 => [Method::GET],
            self::V1_0 => [Method::GET, Method::POST, Method::HEAD],
            self::V1_1 => Method::cases(),
            self::V2 => Method::cases(),
        };
    }
}
