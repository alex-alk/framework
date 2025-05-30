<?php

namespace Controllers;

use Router\View;

class WebController
{
    public function index(): View
    {
        return View::make('home');
    }
}