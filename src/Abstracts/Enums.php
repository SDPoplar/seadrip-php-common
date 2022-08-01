<?php
namespace SeaDrip\Abstracts;

abstract class Enums
{
    public final static function Has(int|string $val): bool
    {
        return in_array($val, self::Values());
    }

    public final static function Values(...$except): array
    {
        return array_diff(array_values(self::_Constants()), $except);
    }

    protected final static function _Constants(): array
    {
        return (new \ReflectionClass(static::class))->getConstants();
    }
}

