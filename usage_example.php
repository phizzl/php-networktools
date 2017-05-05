<?php

use Phizzl\NetworkTools\Http\HttpHeader;
use Phizzl\NetworkTools\Ping\Ping;
use Phizzl\NetworkTools\Tcp\Tcp;

require_once __DIR__ . '/vendor/autoload.php';

$ping = new Ping("127.0.0.1");
$latency = $ping->ping();

echo "Latency {$latency}s for 127.0.0.1\n";

$header = new HttpHeader();
$header->set('X-Awesome', 'Foo');
$http = new \Phizzl\NetworkTools\Http\HttpRequest();
$http->setHost("https://www.google.com");
$http->setHeader($header);
$response = $http->send();
$contents = $response->getBody()->getContents();

echo "www.google.com responded with status code {$response->getStatusCode()}\n";

$port = 22;
$tcp = new Tcp();
$tcp->setHost("127.0.0.1");
$tcp->setPort($port);

if($tcp->send()){
    echo "Local port $port is open\n";
}
else{
    echo "Local port $port is closed\n";
}
