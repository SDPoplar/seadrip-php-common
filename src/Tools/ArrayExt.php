<?php
namespace SeaDrip\Tools;

abstract class ArrayExt
{
    public static function pickKey(array $origin, array $keys): array
    {
        $mask = array_combine($keys, array_pad([], count( $keys ), 0));
        return array_intersect_key($origin, $mask);
    }

    public static function toMap(array $origin, string $key_column): array
    {
        return array_combine(array_column($origin, $key_column), $origin);
    }
}

