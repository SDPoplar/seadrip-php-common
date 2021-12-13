<?php
namespace SeaDrip\Tools\RestfulCurl;

class Client
{
    public function __construct(int $timeout = 10)
    {
        $this->timeout = $timeout;
    }

    public function get(string $url, array|string $body = '', array $header = []) : Response
    {
        return $this->request('get', $url, $body, $header);
    }

    public function post(string $url, array|string $body, array $header = []) : Response
    {
        return $this->request('post', $url, $body, $header);
    }

    public function put(string $url, array|string $body, array $header = []) : Response
    {
        return $this->request('put', $url, $body, $header);
    }

    public function delete(string $url, array|string $body = '', array $header = []) : Response
    {
        return $this->request('delete', $url, $body, $header);
    }

    public function patch(string $url, array|string $body, array $header = []) : Response
    {
        return $this->request('patch', $url, $body, $header);
    }

    public function options(string $url, array|string $body = '', array $header = []) : Response
    {
        return $this->request('options', $url, $body, $header);
    }

    public function execute(Request $req) : Response
    {
        return $this->request($req::getMethod(), $req->getUrl(), $req->packBody(), $req->getHeaders());
    }

    public function request(string $method, string $url, array|string $body, array $header = []) : Response
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        $content = curl_exec($ch);
        $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        return new Response($status, $content);
    }

    protected int $timeout;
}

