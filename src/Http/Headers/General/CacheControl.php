<?php
namespace SeaDrip\Http\Headers\General;

class CacheControl extends \SeaDrip\Http\Headers\Line
{
    public function __construct()
    {
        parent::__construct('Cache-Control');
    }

    protected function packData(): string
    {
        return implode(', ', $this->switches);
    }

    protected array $switches = [];
}
