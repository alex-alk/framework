<?php

use Controllers\WebController;
use Router\Routes;

$routes = new Routes();

// --------------- routes --------------------------
$routes->get('/', [WebController::class, 'index']);


// -------------------------------------------------

return $routes;