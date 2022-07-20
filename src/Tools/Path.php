<?php
namespace SeaDrip\Tools;

class Path implements \Stringable
{
    public function __construct(string ...$parts)
    {
        $cleared_parts = array_filter(array_map(
            fn(string $part) => rtrim($part, DIRECTORY_SEPARATOR),
            $parts
        ));
        $this->path = implode(DIRECTORY_SEPARATOR, $cleared_parts);
    }

    public function exists(): bool
    {
        return file_exists($this->path);
    }

    public function isWritable(): bool
    {
        return is_writable($this->path);
    }

    public function isReadable(): bool
    {
        return is_readable($this->path);
    }

    public function __toString(): string
    {
        return $this->path;
    }

    public function create(): string
    {
        return mkdir($this->path, 0755, true);
    }

    public readonly string $path;
}

