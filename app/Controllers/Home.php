<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function home()
    {
		$modelBooks = model(BooksModel::class);
		$modelCovers = model(CoversModel::class);

		$data = [
			'books'  => $modelBooks->getRecent(12),
			'covers' => $modelCovers->getRecent(12),
		];
		
		
        echo view('templates/header');
		echo view('pages/home', $data);
		echo view('templates/footer');
    }
	
	public function profile()
    {
		$session = session();
		$data = [
			'username' => $session->get('username'),
			'email' => $session->get('email'),
			'joined' => $session->get('joined'),
		];
		
        echo view('templates/header');
		echo view('pages/profile',$data);
		echo view('templates/footer');
    }
	
	public function category($category=null)
	{
		$modelBooks = model(BooksModel::class);
		$modelCovers = model(CoversModel::class);
		
		$data = [
			'books'  => $modelBooks->getCategory($category),
			'recentBooks' => $modelBooks->getRecent(6, $category),
			'covers' => $modelCovers->getCategory($category),
			'recentCovers' => $modelCovers->getRecent(6, $category),
			
		];
		
		echo view('templates/header');
		echo view('pages/showCategory', $data);
		echo view('templates/footer');
	}
}
