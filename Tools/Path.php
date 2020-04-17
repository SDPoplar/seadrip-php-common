<?php
namespace SeaDrip\Tools;

class Path
{
    public static function mix( string ...$parts ) : string {
        $ret = '';
        foreach( $parts as $part ) {
            $ret .= $part;
            if( !empty( $ret ) && !self::is_end_with_ps( $ret ) ) {
                $ret .= DIRECTORY_SEPARATOR;
            }
        }
        return $ret;
    }

    public static function is_end_with_ps( string $path ) : bool {
        return $path[ strlen( $path ) - 1 ] == DIRECTORY_SEPARATOR;
    }
}

