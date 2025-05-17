<?php

require __DIR__ . '/../vendor/autoload.php';


$app = require_once __DIR__ . '/app.php';

$kernel = $app->make(Kernel::class);

// todo: csrf
$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
