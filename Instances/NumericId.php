<?php
namespace SeaDrip\Instances;

class NumericId extends \SeaDrip\Abstracts\CompoundId
{
    protected function parse_origin( string $orgin ) {
        $this->init( '', intval( $orgin ) );
    }
}

