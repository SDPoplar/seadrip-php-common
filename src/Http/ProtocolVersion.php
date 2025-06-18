<?php
namespace SeaDrip\Http;

/**
 * Http version number
 * almost the same like enum Protocal, but without prefix 'HTTP/'
 * this only number version protocal is made for PSR-7: HTTP message interfaces
 * MessageInterface::getProtocalVersion() prescribed that the method
 *      MUST contain only the HTTP version number (e.g., "1.1", "1.0")
 * so this why we defined enum ProtocolVersion when we already have enum Protocal
 * 
 * @link Psr-7 https://www.php-fig.org/psr/psr-7/
 */
enum ProtocolVersion: string
{
    case V0_9 = '0.9';
    case V1_0 = '1.0';
    case V1_1 = '1.1';
    case V2   = '2';
}
