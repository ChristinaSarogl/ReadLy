<?php

namespace App\Models;

use CodeIgniter\Model;

class CoversModel extends Model
{
    protected $table = 'book_covers';
	
	protected $allowedFields = ['file_name', 'file_type'];
	
	public function getLastIndex()
	{
		return $this->countAll();
	}
	
	public function getCover($slug = false)
	{
		return $this->where(['slug' => $slug])->first();
	}
	
	public function getRecent()
	{
		return $this->orderBy('id', 'DESC')->findAll(12);
	}
}