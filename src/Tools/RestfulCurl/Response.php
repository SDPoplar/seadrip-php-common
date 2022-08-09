<?php
namespace SeaDrip\Tools\RestfulCurl;

class Response
{
    public function __construct(int $status, string $content)
    {
        $this->status = $status;
        $this->content = $content;
    }

    public function isSuccess() : bool
    {
        return in_array($this->status, [200, 204]);
    }
    
    public function parseContent(callable $parser)
    {
        return $parser($this->content);
    }

    public readonly int $status;
    public readonly string $content;
}

