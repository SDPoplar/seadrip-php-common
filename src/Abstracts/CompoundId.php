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
        $this->origin = $id;
        $this->parseOrigin($this->origin);
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
        return $this->origin;
    }

    protected final function init(string $group, int $id_val): void
    {
        $this->id_val = $id_val;
        $this->group = $group;
    }

    public readonly string $origin;
    private $group;
    private $id_val;
}

