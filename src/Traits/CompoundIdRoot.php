<?php
namespace SeaDrip\Traits;
use \SeaDrip\Instances\CompoundId as CI;

trait CompoundIdRoot
{
    public function __construct( CI $root_id ) {
        $this->_id = $root_id;
    }

    public function get_root_id() : CI {
        return $this->_id;
    }

    private $_id;
}

