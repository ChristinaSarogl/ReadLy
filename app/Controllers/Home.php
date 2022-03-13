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
	
	public function addBook()
	{		
		$modelBooks = model(BooksModel::class);
		$modelCover = model(CoversModel::class);
		
		if ($this->request->getMethod() === 'post' && $this->validate([
			'title' => 'required|min_length[3]',
			'author' => 'required',
			'summary' => 'required',
			'publisher' => 'required|min_length[3]',
			'release' => 'required',
			'bookCover' => 'uploaded[bookCover]',
		])){			
			$coverImage = $this->request->getFile('bookCover');			
			$coverImage->move(ROOTPATH.'public/covers');
			
			$modelCover->save([
				'file_name' => $coverImage->getName(),
				'file_type' => $coverImage->getClientMimeType()
			]);
			
			$cover_id = $modelCover->getLastIndex();
			
			$modelBooks->save([
				'title' => $this->request->getPost('title'),
				'author' => $this->request->getPost('author'),
				'summary' => $this->request->getPost('summary'),
				'publisher' => $this->request->getPost('publisher'),
				'release_date' => $this->request->getPost('release'),
				'slug'  => url_title($this->request->getPost('title'), '-', true),
				'cover' => $cover_id,
			]);
			
			return redirect()->to('/home'); 
		} else {
			echo view('templates/header');
			echo view('pages/addBook');
			echo view('templates/footer');
		}
	
	}
}
