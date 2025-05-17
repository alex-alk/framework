<?php

use App\Support\HttpClient\Factory\RequestFactory;
use HttpClient\Client\HttpClient;

require __DIR__ . '/../vendor/autoload.php';

$client = new HttpClient();
$resp = $client->request(RequestFactory::METHOD_GET, 'https:://www.google.ro');