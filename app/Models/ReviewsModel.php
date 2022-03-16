<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewsModel extends Model
{
    protected $table = 'reviews';
	
	protected $allowedFields = ['title','review','created_at','book_id','user_id'];
	
	public function getReviews($bookId)
	{
		return $this->where(['book_id' => $bookId])->findAll();
	}
	
	public function getUserReviews($userID)
	{
		return $this->where(['user_id' => $userID])->findAll();
	}
}