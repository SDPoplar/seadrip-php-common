<?php
namespace SeaDrip\Tools\RestfulCurl;

class Client
{
    public function __construct(int $timeout = 10)
    {
        $this->timeout = $timeout;
    }

    public function request(Request $request) : Response
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $request->url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($request->method->value));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request->fields);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request->headers);
        $content = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return new Response($status, $content);
    }

    protected int $timeout;
}

