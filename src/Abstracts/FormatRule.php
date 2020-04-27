<?php
namespace SeaDrip\Abstracts;

abstract class FormatRule
{
    abstract protected function get_columns() : array;

    public static function create() : FormatRule {
        $clsName = static::class;
        return new $clsName;
    }

    public function get_alias_map() : array {
        return [];
    }
}

