<?php
namespace SeaDrip\Abstracts;

abstract class Component
{
    public function &bind_parent( $parent ) {
        $this->_parent =& $parent;
        return $this;
    }

    private $_parent;
}

