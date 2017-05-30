<?php

namespace Phizzl\NetworkTools\Http;


use GuzzleHttp\Client;

class HttpRequest
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $host;

    /**
     * @var int
     */
    private $port;

    /**
     * @var HttpHeader
     */
    private $header;

    /**
     * @var string
     */
    private $body;

    /**
     * @var HttpOptions
     */
    private $options;

    /**
     * @var string
     */
    private $method;

    public function __construct(){
        $this->client = new Client();
        $this->header = new HttpHeader();
        $this->body = "";
        $this->options = new HttpOptions();
        $this->method = "GET";
    }

    /**
     * @param HttpHeader $header
     */
    public function setHeader(HttpHeader $header){
        $this->header = $header;
    }

    /**
     * @param HttpOptions $options
     */
    public function setOptions(HttpOptions $options){
        $this->options = $options;
    }

    /**
     * @return HttpHeader
     */
    public function getHeader(){
        return $this->header;
    }

    /**
     * @return HttpOptions
     */
    public function getOptions(){
        return $this->options;
    }

    /**
     * @param string $host
     */
    public function setHost($host){
        $this->host = (string)$host;
    }

    /**
     * @param mixed $port
     */
    public function setPort($port){
        $this->port = (int)$port;
    }

    /**
     * @param string $body
     */
    public function setBody($body){
        $this->body = (string)$body;
    }

    /**
     * @param string $method
     */
    public function setMethod($method){
        $this->method = (string)$method;
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function send(){
        $options = array_merge([
            'headers' => $this->header->getHeader(),
            'body' => $this->body,
            'curl' => [CURLOPT_FOLLOWLOCATION => true]
        ], $this->options->getOptions());

        return $this->client->request('GET', $this->host, $options);
    }
}