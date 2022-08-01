<?php
namespace SeaDrip\Abstracts;

abstract class CompoundId
{
    abstract protected function parseOrigin(string $orgin);

    /*
    public static function create( string $group, int $id_val ) : CompoundId {
        
    }
    */

    public final function __construct(string $id)
    {
        $this->_origin = $id;
        $this->parseOrigin($this->_origin);
    }

    public final function getOrigin(): string
    {
        return $this->origin;
    }

    public final function get_group(): string
    {
        return $this->group;
    }

    public final function getIDVal(): int
    {
        return $this->id_val;
    }

    public final function __toString(): string
    {
        return $this->getOrigin();
    }

    protected final function init(string $group, int $id_val): void
    {
        $this->id_val = $id_val;
        $this->group = $group;
    }

    private $origin;
    private $group;
    private $id_val;
}

