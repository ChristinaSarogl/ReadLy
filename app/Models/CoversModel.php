<?php

namespace App\Models;

use CodeIgniter\Model;

class CoversModel extends Model
{
    protected $table = 'book_covers';
	
	protected $allowedFields = ['file_name', 'file_type','category'];
	
	public function getLastIndex()
	{
		return $this->countAll();
	}
	
	public function getCover($id = false)
	{
		return $this->where(['id' => $id])->first();
	}
	
	public function getRecent($category = false)
	{
		if ($category === false) {
			return $this->orderBy('id', 'DESC')->findAll(12);
		}
		return $this->where(['category' => $category])->orderBy('id', 'DESC')->findAll(12);
	}
	
	public function getCategory($category = null)
	{
		return $this->where(['category' => $category])->findAll();
	}
}