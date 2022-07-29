<?php
namespace SeaDrip\Tools;

abstract class ArrayExt
{
    public static function pick_key( array $origin, array $keys ) : array
    {
        $mask = array_combine($keys, array_pad([], count( $keys ), 0));
        return array_intersect_key($origin, $mask);
    }
}

