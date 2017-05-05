<?php


namespace Phizzl\NetworkTools\Http;


class HttpOptions
{
    /**
     * @var float
     */
    private $timeout;

    /**
     * @var bool
     */
    private $allowRedirects;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    private $allowedOptions = [
        "timeout", "allow_redirects", "auth"
    ];

    /**
     * HttpHeader constructor.
     */
    public function __construct(){
        $this->timeout = .0;
        $this->allowRedirects = false;
        $this->username = "";
        $this->password = "";
    }

    /**
     * @param float $timeout
     */
    public function setTimeout($timeout){
        $this->timeout = $timeout;
    }

    /**
     * @param bool $allowRedirects
     */
    public function setAllowRedirects($allowRedirects){
        $this->allowRedirects = $allowRedirects;
    }

    /**
     * @param string $username
     */
    public function setUsername($username){
        $this->username = $username;
    }

    /**
     * @param string $password
     */
    public function setPassword($password){
        $this->password = $password;
    }

    /**
     * @return array
     */
    public function getOptions(){
        return [
            "allow_redirects" => $this->allowRedirects,
            "auth" => [$this->username, $this->password],
            "timeout" => $this->timeout
        ];
    }
}