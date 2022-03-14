<?php

namespace App\Controllers;

class Book extends BaseController
{
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
	
	public function view($id=null,$slug=null)
	{
		$modelBooks = model(BooksModel::class);
		$modelCovers = model(CoversModel::class);
		
		$data['book'] = $modelBooks->getBook($id);
		$coverID = $data['book']['cover'];
		
		$data['cover'] = $modelCovers->getCover($coverID);
		
		echo view('templates/header');
		echo view('pages/bookInfo', $data);
		echo view('templates/footer');
	}
	
}