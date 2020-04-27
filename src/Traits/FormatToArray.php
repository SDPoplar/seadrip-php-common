<?php
namespace SeaDrip\Traits;
use \SeaDrip\Abstracts\FormatRule as Rule;
use \SeaDrip\Tools\ArrayExt as ArrTool;

trait FormatToArray
{
    abstract protected function get_format_rule() : array;

    public final function format( Rule $rule ) : array {
        $alias = $rule->get_alias_map();
        $ret = [];
        foreach( $this->pick_formats( $rule ) as $key => $method ) {
            $ret[ array_key_exists( $key, $alias ) ? $key : $alias[ $key ] ] = $method( $this );
        }
        return $ret;
    }

    private final function pick_formats( Rule $rule ) : array {
        return ArrTool::pick_key( $this->get_format_rule(), $rule->get_columns() );
    }
}

