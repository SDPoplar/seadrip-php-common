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
        return $this->getStatus() === 200;
    }

    public function getStatus() : int
    {
        return $this->status;
    }

    public function getContent() : string
    {
        return $this->content;
    }

    public function parseContent(callable $parser)
    {
        return $parser($this->getContent());
    }

    protected int $status;
    protected string $content;
}

