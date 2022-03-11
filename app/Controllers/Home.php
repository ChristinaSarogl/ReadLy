<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function home()
    {
		$model = model(BooksModel::class);
		$data['books'] = $model->getRecent();
		
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
	
	public function addBook()
	{
		$model = model(BooksModel::class);
		
		if ($this->request->getMethod() === 'post' && $this->validate([
			'title' => 'required|min_length[3]',
			'author' => 'required',
			'summary' => 'required',
			'publisher' => 'required|min_length[3]',
			'release' => 'required'
		])){
			$model->save([
			'title' => $this->request->getPost('title'),
			'author' => $this->request->getPost('author'),
			'summary' => $this->request->getPost('summary'),
			'publisher' => $this->request->getPost('publisher'),
			'release_date' => $this->request->getPost('release'),
			'slug'  => url_title($this->request->getPost('title'), '-', true),
			]);
			
			return redirect()->to('/home');
		} else {
			echo view('templates/header');
			echo view('pages/addBook');
			echo view('templates/footer');
		}
	
	}
}
