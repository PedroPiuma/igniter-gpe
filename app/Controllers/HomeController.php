<?php

namespace App\Controllers;

class HomeController extends BaseController
{
    public function welcome(): string
    {
        return view('welcome_message');
    }
}
