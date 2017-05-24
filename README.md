PHP network tools
=================

A simple set of tools to perform network actions

* HTTP(S) keyword check
* Ping check
* TCP port check


## HTTP(S) keyword check
```php
use Phizzl\NetworkTools\Http\HttpHeader;
use Phizzl\NetworkTools\Http\HttpRequest;

$header = new HttpHeader();
$header->set('X-Awesome', 'Foo');
$http = new HttpRequest();
$http->setHost("https://www.google.com");
$http->setHeader($header);
$response = $http->send();
$contents = $response->getBody()->getContents();

echo "www.google.com responded with status code {$response->getStatusCode()}\n";
```

## Ping check
Note that the ping check makes use of the OS ping command. The command won't work with any other output as english (see geerlingguy/ping).
```php
use Phizzl\NetworkTools\Ping\Ping;

$ping = new Ping("127.0.0.1");
$latency = $ping->ping();

echo "Latency {$latency}s for 127.0.0.1\n";
```

## TCP port check
```php
use Phizzl\NetworkTools\Tcp\Tcp;

$port = 22;
$tcp = new Tcp();
$tcp->setHost("github.com");
$tcp->setPort($port);

if($tcp->send()){
    echo "Githubs port $port is open\n";
}
else{
    echo "Githubs port $port is closed\n";
}
```