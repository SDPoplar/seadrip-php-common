<?php
namespace SeaDrip\Abstracts;

abstract class FormatRule
{
    abstract protected function get_columns(): array;

    public static function create(): static
    {
        return new (static::class);
    }

    public function get_alias_map(): array
    {
        return [];
    }
}
