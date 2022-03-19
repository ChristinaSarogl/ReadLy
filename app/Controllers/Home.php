<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function home()
    {
		$modelBooks = model(BooksModel::class);
		$modelCovers = model(CoversModel::class);
		$modelReviews = model(ReviewsModel::class);
		$modelUsers = model(UsersModel::class);

		$data = [
			'books'  => $modelBooks->getRecent(12),
			'covers' => $modelCovers->getRecent(12),
		];
		
		$reviews = $modelReviews->getRecent(12);
		if (!empty($reviews)){
			$data['reviews'] = $reviews;
			$usernames = array();
			$titles = array();
			$covers = array();
			$index = 0;
			foreach($reviews as $review){
				$user = $modelUsers->getUser($review['user_id']);
				$usernames[$index] = $user['username'];
				$book = $modelBooks->getBook($review['book_id']);
				$titles[$index] = $book['title'];
				$cover = $modelCovers->getCover($book['cover']);
				$covers[$index] = $cover['file_name'];
				$index++;
			}
			
			$data['usernames'] = $usernames;
			$data['revTitles'] = $titles;
			$data['revCovers'] = $covers;
		} else {
			$data['reviews'] = array();
			$data['usernames'] = array();
			$data['revTitles'] = array();
			$data['revCovers'] = array();
		}
		
        echo view('templates/header');
		echo view('pages/home', $data);
		echo view('templates/footer');
    }
	
	public function category($category=null)
	{
		$modelBooks = model(BooksModel::class);
		$modelCovers = model(CoversModel::class);
		$modelReviews = model(ReviewsModel::class);
		
		$data = [
			'books'  => $modelBooks->getCategory($category),
			'recentBooks' => $modelBooks->getRecent(6, $category),
			'covers' => $modelCovers->getCategory($category),
			'recentCovers' => $modelCovers->getRecent(6, $category),
			
		];
		
		$ratings = array();
		foreach($data['books'] as $book){
			$reviews = $modelReviews->getReviews($book['id']);
			if (!empty($reviews)){
				$bookRating = 0;
				foreach($reviews as $review){
					$bookRating = $bookRating + $review['rating'];
				}
				array_push($ratings,($bookRating/count($reviews)));
			} else{
				array_push($ratings,"none");
			}			 
		}
		$data['ratings'] = $ratings;		
		
		echo view('templates/header');
		echo view('pages/showCategory', $data);
		echo view('templates/footer');
	}
	
	public function search($input){
		$modelBooks = model(BooksModel::class);
		$modelCovers = model(CoversModel::class);
		
		$data['books'] = $modelBooks->searchTitle($input);
		$data['authors'] = $modelBooks->searchAuthor($input);
		$data['publishers'] = $modelBooks->searchPublisher($input);
		
		$covers = array();
		foreach($data['books'] as $book){
			array_push($covers,$modelCovers->getCover($book['cover']));
		}
		$data['covers'] = $covers;
		
		echo view('templates/header');
		echo view('pages/search',$data);
		echo view('templates/footer');
	}
}
