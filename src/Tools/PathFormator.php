<?php
namespace SeaDrip\Tools;

class PathFormator {
    public static function FrontDirSep( string $path ) : string {
        return ( empty( $path ) || self::IsDirSep( $path[ 0 ] ) ? '' : DIRECTORY_SEPARATOR ).$path;
    }

    public static function EndDirSep( string $path ) : string {
        return $path.( empty( $path ) || self::IsDirSep( substr( $path, -1 ) ) ? '' : DIRECTORY_SEPARATOR );
    }

    public static function IsDirSep( string $sep ) : bool {
        return in_array( $sep, [ '\\', '/' ] );
    }

    public static function Concat( string ...$parts ) : string {
        $path = '';
        foreach( $parts as $item ) {
            $path = self::EndDirSep( $path ).$item;
        }
        return $path;
    }
}

