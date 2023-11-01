<?php
namespace SeaDrip\Http;

/**
 * Response Status Codes (RFC7231 - section 6)
 * @see https://datatracker.ietf.org/doc/html/rfc7231#section-6
 */
enum Status: int
{
    //  1xx
    case Continue                      = 100;       // Section 6.2.1
    case SwitchingProtocols            = 101;       // Section 6.2.2

    //  2xx
    case OK                            = 200;       // Section 6.3.1
    case Created                       = 201;       // Section 6.3.2
    case Accepted                      = 202;       // Section 6.3.3
    case NonAuthoritativeInformation   = 203;       // Section 6.3.4
    case NoContent                     = 204;       // Section 6.3.5            
    case ResetContent                  = 205;       // Section 6.3.6            
    case PartialContent                = 206;       // Section 4.1 of [RFC7233]

    //  3xx
    case MultipleChoices               = 300;       // Section 6.4.1
    case MovedPermanently              = 301;       // Section 6.4.2
    case Found                         = 302;       // Section 6.4.3
    case SeeOther                      = 303;       // Section 6.4.4
    case NotModified                   = 304;       // Section 4.1 of [RFC7232]
    case UseProxy                      = 305;       // Section 6.4.5
    case TemporaryRedirect             = 307;       // Section 6.4.7

    //  4xx
    case BadRequest                    = 400;       // Section 6.5.1
    case Unauthorized                  = 401;       // Section 3.1 of [RFC7235]
    case PaymentRequired               = 402;       // Section 6.5.2
    case Forbidden                     = 403;       // Section 6.5.3
    case NotFound                      = 404;       // Section 6.5.4
    case MethodNotAllowed              = 405;       // Section 6.5.5
    case NotAcceptable                 = 406;       // Section 6.5.6
    case ProxyAuthenticationRequired   = 407;       // Section 3.2 of [RFC7235]
    case RequestTimeout                = 408;       // Section 6.5.7
    case Conflict                      = 409;       // Section 6.5.8
    case Gone                          = 410;       // Section 6.5.9
    case LengthRequired                = 411;       // Section 6.5.10
    case PreconditionFailed            = 412;       // Section 4.2 of [RFC7232]
    case PayloadTooLarge               = 413;       // Section 6.5.11
    case URITooLong                    = 414;       // Section 6.5.12
    case UnsupportedMediaType          = 415;       // Section 6.5.13
    case RangeNotSatisfiable           = 416;       // Section 4.4 of [RFC7233]
    case ExpectationFailed             = 417;       // Section 6.5.14
    case UpgradeRequired               = 426;       // Section 6.5.15

    //  5xx
    case InternalServerError           = 500;       // Section 6.6.1
    case NotImplemented                = 501;       // Section 6.6.2
    case BadGateway                    = 502;       // Section 6.6.3
    case ServiceUnavailable            = 503;       // Section 6.6.4
    case GatewayTimeout                = 504;       // Section 6.6.5
    case HTTPVersionNotSupported       = 505;       // Section 6.6.6

    public function message(): string
    {
        return match($this) {
            //  1xx
            self::Continue                      => 'Continue',
            self::SwitchingProtocols            => 'Switching Protocols',

            //  2xx
            self::OK                            => 'OK',
            self::Created                       => 'Created',
            self::Accepted                      => 'Accepted',
            self::NonAuthoritativeInformation   => 'Non-Authoritative Information',
            self::NoContent                     => 'No Content',
            self::ResetContent                  => 'Reset Content',
            self::PartialContent                => 'Partial Content',

            //  3xx
            self::MultipleChoices               => 'Multiple Choices',
            self::MovedPermanently              => 'Moved Permanently',
            self::Found                         => 'Found',
            self::SeeOther                      => 'See Other',
            self::NotModified                   => 'Not Modified',
            self::UseProxy                      => 'Use Proxy',
            self::TemporaryRedirect             => 'Temporary Redirect',

            //  4xx
            self::BadRequest                    => 'Bad Request',
            self::Unauthorized                  => 'Unauthorized',
            self::PaymentRequired               => 'Payment Required',
            self::Forbidden                     => 'Forbidden',
            self::NotFound                      => 'Not Found',
            self::MethodNotAllowed              => 'Method Not Allowed',
            self::NotAcceptable                 => 'Not Acceptable',
            self::ProxyAuthenticationRequired   => 'Proxy Authentication Required',
            self::RequestTimeout                => 'Request Timeout',
            self::Conflict                      => 'Conflict',
            self::Gone                          => 'Gone',
            self::LengthRequired                => 'Length Required',
            self::PreconditionFailed            => 'Precondition Failed',
            self::PayloadTooLarge               => 'Payload Too Large',
            self::URITooLong                    => 'URI Too Long',
            self::UnsupportedMediaType          => 'Unsupported Media Type',
            self::RangeNotSatisfiable           => 'Range Not Satisfiable',
            self::ExpectationFailed             => 'Expectation Failed',
            self::UpgradeRequired               => 'Upgrade Required',

            //  5xx
            self::InternalServerError           => 'Internal Server Error',
            self::NotImplemented                => 'Not Implemented',
            self::BadGateway                    => 'Bad Gateway',
            self::ServiceUnavailable            => 'Service Unavailable',
            self::GatewayTimeout                => 'Gateway Timeout',
            self::HTTPVersionNotSupported       => 'HTTP Version Not Supported',
        };
    }
}
