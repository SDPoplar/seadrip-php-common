<?php
namespace SeaDrip\Tools\Codec;

class Aes
{
    //  const METHOD_MAP = [];
    const DEF_METHOD = 'AES-128-ECB';

    public function __construct( string $key, string $iv ) {
        $this->_key = $key;
        $this->_iv = $iv;
    }

    public function encrypt( string $data, string $with_method = self::DEF_METHOD ) : string {
        return openssl_encrypt( $data, $with_method, $this->_key, 0, $this->_iv );
    }

    public function decrypt( string $data, string $with_method = self::DEF_METHOD ) : string {
        return openssl_decrypt( $data, $with_method, $this->_key, 0, $this->_iv );
    }

    protected $_key;
    protected $_iv;
}

