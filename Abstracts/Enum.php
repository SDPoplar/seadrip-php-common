<?php
namespace SeaDrip\Abstracts;

abstract class Enum
{
    public final static function Has( $val ) : bool {
        return in_array( $val, self::Values() );
    }

    public final static function Values( ...$except ) : array {
        return array_diff( array_values( self::_Constants() ), $except );
    }

    private final static function _Constants() : array {
        return ( new ReflectionClass( static::class ) )->getConstants();
    }
}

