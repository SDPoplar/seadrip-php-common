<?php
namespace SeaDrip\Http;

/**
 * Method Definitions (RFC7231 - section 4.3)
 * @see https://datatracker.ietf.org/doc/html/rfc7231#section-4.3
 */
enum Method: string
{
    case GET        = 'GET';
    case HEAD       = 'HEAD';
    case POST       = 'POST';
    case PUT        = 'PUT';
    case DELETE     = 'DELETE';
    case CONNECT    = 'CONNECT';
    case OPTIONS    = 'OPTIONS';
    case TRACE      = 'TRACE';
}
