<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function home()
    {
		$model = model(BooksModel::class);
		$data['books'] = $model->getBooks();
		
        echo view('templates/header');
		echo view('pages/home', $data);
		echo view('templates/footer');
    }
	
	public function profile()
    {
        echo view('templates/header');
		echo view('pages/profile');
		echo view('templates/footer');
    }
}
