<?php

namespace Router;

class RouteNotFound
{
    public static function create(): void
    {
        http_response_code(404);
        die('route not found');
    }
}
