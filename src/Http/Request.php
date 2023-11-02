<?php
namespace SeaDrip\Http;

use Psr\Http\Message\{RequestInterface, UriInterface};

class Request extends Message implements \Psr\Http\Message\RequestInterface
{
    public function getMethod(): string
    {
        return $this->method;
    }

    public function withMethod(string $method): RequestInterface
    {
        $checked_method = Method::tryFrom($method);
        $checked_method or throw new \InvalidArgumentException('unknown http method '.$method);
        $ret = clone $this;
        $ret->method = $checked_method;
        return $ret;
    }

    public function withRequestTarget(string $requestTarget): RequestInterface
    {
        return $this->cast()->initRequestTarget($requestTarget)->initMethod($this->method);
    }

    public function getRequestTarget(): string
    {
        return $this->request_target;
    }

    public function withUri(UriInterface $uri, bool $preserveHost = false): RequestInterface
    {
        $ret = clone $this;
        $ret->uri = $uri;
        // TODO: $preserveHost actions
        /**
         * 当传入的 URI 包含有 HOST 信息时，此方法 **必须** 更新 HOST 信息。如果 URI 
         * 实例没有附带 HOST 信息，任何之前存在的 HOST 信息 **必须** 作为候补，应用
         * 更改到返回的消息实例里。
         * 
         * 你可以通过传入第二个参数来，来干预方法的处理，当 `$preserveHost` 设置为 `true` 
         * 的时候，会保留原来的 HOST 信息。当 `$preserveHost` 设置为 `true` 时，此方法
         * 会如下处理 HOST 信息：
         * 
         * - 如果 HOST 信息不存在或为空，并且新 URI 包含 HOST 信息，则此方法 **必须** 更新返回请求中的 HOST 信息。
         * - 如果 HOST 信息不存在或为空，并且新 URI 不包含 HOST 信息，则此方法 **不得** 更新返回请求中的 HOST 信息。
         * - 如果HOST 信息存在且不为空，则此方法 **不得** 更新返回请求中的 HOST 信息。
         * 
         * 此方法在实现的时候，**必须** 保留原有的不可修改的 HTTP 请求实例，然后返回
         * 一个新的修改过的 HTTP 请求实例。
         */

        return $ret;
    }

    public function getUri(): UriInterface
    {
        return $this->uri;
    }

    protected function &initMethod(string $method): static
    {
        $this->method = $method;
        return $this;
    }

    protected function &initURI(UriInterface $uri): static
    {
        $this->uri = $uri;
        return $this;
    }

    protected function &initRequestTarget(string $requestTarget): static
    {
        $this->request_target = $requestTarget;
        return $this;
    }

    protected readonly string $method;
    protected readonly UriInterface $uri;
    protected readonly string $request_target;
}
