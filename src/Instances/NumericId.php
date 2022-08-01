<?php
namespace SeaDrip\Instances;

class NumericId extends \SeaDrip\Abstracts\CompoundId
{
    protected function parseOrigin( string $orgin ) {
        $this->init( '', intval( $orgin ) );
    }
}

