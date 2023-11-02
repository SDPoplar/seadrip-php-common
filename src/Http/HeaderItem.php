<?php
namespace SeaDrip\Http;

class HeaderItem implements \Stringable
{
    public function __construct(public readonly string $name, string ...$values)
    {
        $this->values = $values;
    }

    public function merge(string ...$values): static
    {
        return new static(
            $this->name,
            ...array_unique([...$values, ...$this->values])
        );
    }

    public function __toString(): string
    {
        return $this->name.': '.implode(',', $this->values);
    }

    public array $values;
}
