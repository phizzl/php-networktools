<?php


namespace Phizzl\NetworkTools\Http;


class HttpHeader
{
    /**
     * @var array
     */
    private $header;

    /**
     * HttpHeader constructor.
     */
    public function __construct(){
        $this->header = [];
    }

    /**
     * @param string $name
     * @param string $value
     */
    public function set($name, $value){
        $this->header[$name] = $value;
    }

    /**
     * @return array
     */
    public function getHeader(){
        return $this->header;
    }
}