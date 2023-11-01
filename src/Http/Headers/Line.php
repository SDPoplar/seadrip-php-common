<?php
namespace SeaDrip\Http\Headers;

abstract class Line implements \Stringable
{
    abstract protected function packData(): string;

    public function __construct(
        public readonly string $field
    ) {}

    public function __toString(): string
    {
        return $this->field.': '.static::packData();
    }
}