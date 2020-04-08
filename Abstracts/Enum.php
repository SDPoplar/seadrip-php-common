<?php
namespace SeaDrip\Abstracts;

abstract class Enum
{
    public final static function Has( $val ) : bool {
        return in_array( $val, array_values( self::_constants() ) );
    }

    private final static function _constants() : array {
        return ( new ReflectionClass( static::class ) )->getConstants();
    }
}

