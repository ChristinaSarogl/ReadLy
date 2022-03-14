<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function home()
    {
		$modelBooks = model(BooksModel::class);
		$modelCovers = model(CoversModel::class);

		$data = [
			'books'  => $modelBooks->getRecent(),
			'covers' => $modelCovers->getRecent(),
		];
		
		
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
	
	public function category($category=null)
	{
		$modelBooks = model(BooksModel::class);
		$modelCovers = model(CoversModel::class);
		
		$data = [
			'books'  => $modelBooks->getCategory($category),
			'recentBooks' => $modelBooks->getRecent($category),
			'covers' => $modelCovers->getCategory($category),
			'recentCovers' => $modelCovers->getRecent($category),
			
		];
		
		echo view('templates/header');
		echo view('pages/showCategory', $data);
		echo view('templates/footer');
	}
}
