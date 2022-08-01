<?php
namespace SeaDrip\Abstracts;

abstract class Singleton
{
    public final static function Get(): static
    {
        $name = static::class;
        if (!array_key_exists($name, self::$_ins)) {
            self::$_ins[$name] = new $name();
        }
        return self::$_ins[$name];
    }

    private static $_ins = [];
}

