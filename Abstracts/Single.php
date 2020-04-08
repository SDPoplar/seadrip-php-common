<?php
namespace SeaDrip\Abstracts;

abstract class Single
{
    public final static function Get() : Single {
        $name = static::class;
        if( array_key_exists( $name, self::$_ins ) ) {
            self::$_ins[ $name ] = new $name();
        }
        return self::$_ins[ $name ];
    }

    protected function init() {
    }

    private final function __construct() {
        $this->init();
    }

    private static $_ins = [];
}

