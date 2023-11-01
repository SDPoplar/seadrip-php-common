<?php
namespace SeaDrip\Http\Headers\General;

class Via extends \SeaDrip\Http\Headers\Line
{
    public function __construct(string $history)
    {
        parent::__construct('Via');
        $this->history = array_map(fn(string $item) => trim($item), explode(',', $history));
    }

    public function append(string $protocol_version, string $node_name, string $protocol_name = '', string $comment = ''): void
    {
        $protocol_name = empty($protocol_name) ? $protocol_name : $protocol_name.' ';
        $comment = empty($comment) ? $comment : ' '.$comment;
        $this->history[] = "{$protocol_name}{$protocol_version} {$node_name}{$comment}";
    }

    protected function packData(): string
    {
        return implode(', ', $this->history);
    }

    protected array $history;
}
