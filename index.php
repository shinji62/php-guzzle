<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Promise;

$client = new Client();

// Initiate each request but do not block
$promises = [
	'yahoo' => $client->getAsync('http://www.yahoo.co.jp/'),
	'passmarket' => $client->getAsync('http://passmarket.yahoo.co.jp/'),
];

// Wait on all of the requests to complete.
$results = Promise\unwrap($promises);

echo $results['yahoo']->getBody();
echo $results['passmarket']->getBody();