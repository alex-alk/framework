<?php

use App\Controllers\WebController;
use Support\Router\Routes;

$routes = new Routes();

// --------------- routes --------------------------
$routes->get('/', [WebController::class, 'index']);


// -------------------------------------------------

return $routes;