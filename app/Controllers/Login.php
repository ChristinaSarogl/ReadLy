<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function login()
    {
        echo view('templates/header');
		echo view('templates/footer');
    }
}