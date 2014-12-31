<?php

namespace Clue\React\Buzz\Message;

use Clue\React\Buzz\Message\Headers;
use Clue\React\Buzz\Message\Body;

class Response implements Message
{
    private $protocol;
    private $code;
    private $reasonPhrase;
    private $headers;
    private $body;

    /**
     * @param $protocol
     * @param $code
     * @param $reasonPhrase
     * @param \Clue\React\Buzz\Message\Headers $headers
     * @param \Clue\React\Buzz\Message\Body $body
     */
    public function __construct($protocol, $code, $reasonPhrase, Headers $headers = null, Body $body = null)
    {
        if ($headers === null) {
            $headers = new Headers();
        }
        if ($body === null) {
            $body = new Body();
        }
        $this->protocol = $protocol;
        $this->code = $code;
        $this->reasonPhrase = $reasonPhrase;
        $this->headers = $headers;
        $this->body = $body;
    }

    public function getStatusLine()
    {
        return $this->getHttpVersion() . ' ' . $this->getCode() . ' ' . $this->getReasonPhrase();
    }

    public function getHttpVersion()
    {
       return $this->protocol;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getReasonPhrase()
    {
        return $this->reasonPhrase;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @param $name String
     * @return mixed
     */
    public function getHeader($name)
    {
        return $this->headers->getHeaderValue($name);
    }

    public function getBody()
    {
        return $this->body;
    }
}
