<?php
namespace SeaDrip\Traits;

trait LazyComponent
{
    protected function &lazy_component( &$val, string $component_class ) {
        if( $val === null ) {
            $val = new $component_class();
            $val->bind_parent( $this );
        }
        return $val;
    }
}

