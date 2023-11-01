<?php
namespace SeaDrip\Http\Headers\General;

class Connection extends \SeaDrip\Http\Headers\Line
{
    public function __construct()
    {
        parent::__construct('Connection');
    }

    protected function packData(): string
    {
        return '';
    }
}
