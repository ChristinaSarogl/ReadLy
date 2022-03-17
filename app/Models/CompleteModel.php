<?php

namespace App\Models;

use CodeIgniter\Model;

class CompleteModel extends Model
{
	protected $table = 'completed';
	
	protected $allowedFields = ['book_id', 'user_id'];
	
	public function getList($userID){
		return $this->where(['user_id' => $userID])->findAll();
	}
	
}