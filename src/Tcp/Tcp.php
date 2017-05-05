<?php

namespace Phizzl\NetworkTools\Tcp;


class Tcp
{
    private $host;

    private $port;

    private $timeout;

    private $errno;

    private $errstr;

    private $message;

    public function __construct(){
        $this->host = "";
        $this->port = 0;
        $this->errno = 0;
        $this->errstr = "";
        $this->message = "";
        $this->timeout = 5;
    }

    /**
     * @param string $host
     */
    public function setHost($host){
        $this->host = (string)$host;
    }

    /**
     * @param int $port
     */
    public function setPort($port){
        $this->port = (int)$port;
    }

    /**
     * @param mixed $timeout
     */
    public function setTimeout($timeout){
        $this->timeout = (float)$timeout;
    }

    /**
     * @param string $message
     */
    public function setMessage($message){
        $this->message = $message;
    }

    /**
     * @return int
     */
    public function getErrno(){
        return $this->errno;
    }

    /**
     * @return string
     */
    public function getErrstr(){
        return $this->errstr;
    }

    /**
     * @return bool|string
     */
    public function send(){
        $return = true;
        if(!$fp = @fsockopen(
            "tcp://{$this->host}",
                $this->port,
                $this->errno,
                $this->errstr,
                $this->timeout ? $this->timeout : null)){
            $return = false;
        }

        if($return && strlen($this->message)){
            $return = "";
            fwrite($fp, $this->message);
            while(!feof($fp)){
                $return .= fgets($fp, 128);
            }
        }

        @fclose($fp);

        return $return;
    }
}