<?php
namespace SeaDrip\Http;

enum Method: string
{
    //  http - 1.0
    case Get = 'GET';
    case Post = 'POST';
    case Head = 'HEAD';

    //  http - 1.1
    case Options = 'OPTIONS';
    case Put = 'PUT';
    case Patch = 'PATCH';
    case Delete = 'DELETE';
    case Trace = 'TRACE';
    case Connect = 'CONNECT';
}
