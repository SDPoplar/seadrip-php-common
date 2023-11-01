<?php
namespace SeaDrip\Http\Headers\General;

class Upgrade extends \SeaDrip\Http\Headers\Line
{
    public function __construct(public readonly string $protocol)
    {
        parent::__construct('Upgrade');
    }

    protected function packData(): string
    {
        return $this->protocol;
    }
}
