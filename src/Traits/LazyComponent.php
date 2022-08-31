<?php
namespace SeaDrip\Traits;

trait LazyComponent
{
    protected function &lazy_component(&$val, string $component_class)
    {
        $val ??= (new $component_class())->bind_parent($this);
        return $val;
    }
}

