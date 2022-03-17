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
	
	public function updateList($bookId,$list,$userId)
	{		
		if($list == 1){
			$modelRead = model(ToReadModel::class);
			$books = $modelRead->getList($userId);
			
			$inList = false;
			foreach($books as $book){
				if ($book['book_id'] === $bookId){
					$inList = true;
					break;
				}
			}
				
			if (empty($books) || !$inList){
				$modelRead->save([
					'book_id' => $bookId,
					'user_id' => $userId,
				]);
				
				$passdata['result'] = 'created';		
			} else {
				$passdata['result'] = 'deleted';
				$modelRead->where(['book_id' => $bookId])->delete();			
			}	
		} else if ($list == 2){
			$modelReading  = model(ReadingModel::class);
			$books = $modelReading->getList($userId);
			
			$inList = false;
			foreach($books as $book){
				if ($book['book_id'] === $bookId){
					$inList = true;
					break;
				}
			}
				
			if (empty($books) || !$inList){
				$modelReading->save([
					'book_id' => $bookId,
					'user_id' => $userId,
				]);
				
				$passdata['result'] = 'created';		
			} else {
				$passdata['result'] = 'deleted';
				$modelReading->where(['book_id' => $bookId])->delete();			
			}
		} else if ($list == 3){
			$modelComplete  = model(CompleteModel::class);
			$books = $modelComplete->getList($userId);
			
			$inList = false;
			foreach($books as $book){
				if ($book['book_id'] === $bookId){
					$inList = true;
					break;
				}
			}
				
			if (empty($books) || !$inList){
				$modelComplete->save([
					'book_id' => $bookId,
					'user_id' => $userId,
				]);
				
				$passdata['result'] = 'created';		
			} else {
				$passdata['result'] = 'deleted';
				$modelComplete->where(['book_id' => $bookId])->delete();			
			}
		}
		
		print(json_encode($passdata));	
	}
}