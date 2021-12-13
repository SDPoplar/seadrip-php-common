<?php
namespace SeaDrip\Tools\RestfulCurl;

abstract class Request
{
    abstract public static function getMethod() : string;
    abstract public function getUrl() : string;
    
    public function getHeaders() : array
    {
        return [];
    }

    public function packBody() : string|array
    {
        return '';
    }
}

