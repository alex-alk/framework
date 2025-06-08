<?php

use Container\Container;
use RequestHandler\RequestHandler;
use RequestHandler\ServerRequest;
use Psr\Http\Message\ServerRequestInterface;

require_once '../autoload.php';
require_once '../env.php';

if (!file_exists('../support')) {
    die('support folder not found. <br>Run: git clone https://github.com/alex-alk/support.git');
}

require_once '../support/Utils/functions.php';

// load unit test on dev only
if (file_exists('../vendor/autoload.php')) {
    require_once '../vendor/autoload.php';
}

$request = ServerRequest::createFromGlobals();

$container = new Container();
// solve ServerRequest dependencies for Controllers or other objects
$container->set(ServerRequestInterface::class, function(Container $c) use ($request) {
    return $request;
});

$routes = require_once __DIR__.'/../routes/routes.php';
$requestHandler = new RequestHandler($routes->getRoutes(), $container);
$response = $requestHandler->handle($request);

echo $response->getBody();