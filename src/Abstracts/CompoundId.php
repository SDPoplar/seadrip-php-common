<?php
namespace SeaDrip\Abstracts;

abstract class CompoundId
{
    abstract protected function parse_origin( string $orgin );

    /*
    public static function create( string $group, int $id_val ) : CompoundId {
        
    }
    */

    public final function __construct( string $id ) {
        $this->_origin = $id;
        $this->parse_origin( $this->_origin );
    }

    public final function get_origin() : string {
        return $this->_origin;
    }

    public final function get_group() : string {
        return $this->_group;
    }

    public final function get_id_val() : int {
        return $this->_id_val;
    }

    public final function __toString() : string {
        return $this->get_origin();
    }

    protected final function init( string $group, int $id_val ) {
        $this->_id_val = $id_val;
        $this->_group = $group;
    }

    private $_origin;
    private $_group;
    private $_id_val;
}

