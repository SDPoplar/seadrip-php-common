<?php
namespace SeaDrip\Abstracts;

abstract class Component
{
    public function &bindParent($parent): static
    {
        $this->parent =& $parent;
        return $this;
    }

    public function getParent()
    {
        return $this->parent;
    }

    private $parent;
}

