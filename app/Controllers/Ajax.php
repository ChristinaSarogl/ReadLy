<?php

namespace App\Controllers;

use App\Models\NewsModel;

class Ajax extends BaseController
{
	public function get($category,$userID)
	{
		if ($category == 4){
			$modelReviews = model(ReviewsModel::class);
			$modelBooks = model(BooksModel::class);
			
			$reviews = $modelReviews->getUserReviews($userID);
			
			$passdata = array();
			$index = 0;
			foreach($reviews as $review){
				$bookInfo = $modelBooks->getBook($review['book_id']);
				$passdata[$index] = [
					'created_at' => $review['created_at'],
					'review' => $review['review'],
					'title' => $review['title'],
					'book_id' => $review['book_id'],
					'book_title' => $bookInfo['title'],
					'book_slug' => $bookInfo['slug'],
				];
				$index++;
			}
			
			print(json_encode($passdata));
		}		
	}
}