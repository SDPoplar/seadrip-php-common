<?php
namespace SeaDrip\Http\Headers\General;

class TransferEncoding extends \SeaDrip\Http\Headers\Line
{
    public function __construct(public readonly string $encode_type)
    {
        parent::__construct('Transfer-Encoding');
    }

    protected function packData(): string
    {
        return $this->encode_type;
    }
}
