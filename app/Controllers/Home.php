<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function welcome(): string
    {
        return view('welcome_message');
    }

    public function index(): string
    {
        return view('dashboard');
    }
}
