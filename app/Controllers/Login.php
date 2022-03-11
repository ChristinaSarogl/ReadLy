<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function login()
    {
        echo view('templates/header');
		echo view('pages/login');
		echo view('templates/footer');
    }
	
	public function register()
    {
        echo view('templates/header');
		echo view('pages/register');
		echo view('templates/footer');
    }
}