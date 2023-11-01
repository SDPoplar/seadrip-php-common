<?php
namespace SeaDrip\Tools\Codec;

class Aes
{
    //  const METHOD_MAP = [];
    const DEF_CIPHER = 'AES-128-ECB';

    public function __construct(
        protected readonly string $key,
        protected readonly string $iv,
    ) {}

    public function encrypt(string $data, string $with_cipher = self::DEF_CIPHER): string
    {
        return openssl_encrypt($data, $with_cipher, $this->key, 0, $this->iv);
    }

    public function decrypt(string $data, string $with_method = self::DEF_CIPHER): string
    {
        return openssl_decrypt($data, $with_method, $this->key, 0, $this->iv);
    }
}
