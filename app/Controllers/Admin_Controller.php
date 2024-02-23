<?php

namespace App\Controllers;

class Admin_Controller extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
}
