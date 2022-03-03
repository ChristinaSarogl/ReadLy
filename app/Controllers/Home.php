<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function home()
    {
        echo view('templates/header');
		echo view('templates/footer');
    }
}
