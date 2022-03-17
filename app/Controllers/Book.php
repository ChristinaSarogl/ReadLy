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
			'release' => 'required|valid_date',
			'category' => 'required',
			'bookCover' => 'uploaded[bookCover]',
		])){					
			$coverImage = $this->request->getFile('bookCover');	
			$coverImage->move(ROOTPATH.'public/covers');
			
			$modelCover->save([
				'file_name' => $coverImage->getName(),
				'file_type' => $coverImage->getClientMimeType(),
				'category' => $this->request->getPost('category')
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
				'category' => $this->request->getPost('category')
			]);
			
			return redirect()->to('/home');
		} else {
			echo view('templates/header');
			echo view('pages/addBook');
			echo view('templates/footer');
		}	
	}
	
	public function view($id,$slug)
	{
		$modelBooks = model(BooksModel::class);
		$modelCovers = model(CoversModel::class);
		$modelReviews = model(ReviewsModel::class);
		$modelUsers = model(UsersModel::class);
		
		$data['book'] = $modelBooks->getBook($id);
		$data['cover'] = $modelCovers->getCover($data['book']['cover']);
		
		$data['reviews'] = $modelReviews->getReviews($id);
		$users = array();
		$index = 0;
		foreach($data['reviews'] as $review){
			$user = $modelUsers->getUser($review['user_id']);
			$users[$index] = $user;
			$index++;
		}			
		$data['users'] = $users;
		
		$data['similarBooks'] = $modelBooks->getSimilar($id,$data['book']['category']);
		$data['similarCovers'] = $modelCovers->getSimilar($id,$data['book']['category']);
		
		echo view('templates/header');
		echo view('pages/bookInfo', $data);
		echo view('templates/footer');
	}
	
	
	public function postReview($bookId)
	{
		$modelReviews = model(ReviewsModel::class);
		$modelBooks = model(BooksModel::class);
		$session = session();
		
		if ($this->request->getMethod() === 'post' && $this->validate([
			'title' => 'required|max_length[255]',
			'review' => 'required',			
		])){
			$modelReviews->save([
				'title' => $this->request->getPost('title'),
				'review' => $this->request->getPost('review'),
				'rating' => $this->request->getPost('userRating'),
				'created_at' => date('y-m-d'),				
				'book_id' => $bookId,
				'user_id' => $session->get('id'),
			]);
			
			$book = $modelBooks->getBook($bookId);
			return redirect()->to('/book/'.$bookId.'/'.$book['slug']);
			
		} 
	}
}