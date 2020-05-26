<?php
namespace SeaDrip\Abstracts;

abstract class Component
{
    public function &bind_parent( $parent ) {
        $this->_parent =& $parent;
        return $this;
    }

    public function get_parent() {
        return $this->_parent();
    }

    private $_parent;
}

