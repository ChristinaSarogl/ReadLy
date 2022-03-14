<?php

namespace App\Models;

use CodeIgniter\Model;

class BooksModel extends Model
{
    protected $table = 'books';
	
	protected $allowedFields = ['title', 'author', 'summary',
		'publisher','release_date','slug','cover'];
	
	public function getBooks($slug = false)
	{
		if ($slug === false) {
			return $this->findAll();
		}

		return $this->where(['slug' => $slug])->first();
	}
	
	public function getBook($id = false)
	{
		return $this->where(['id' => $id])->first();
	}
	
	public function getRecent()
	{
		return $this->orderBy('id', 'DESC')->findAll(12);
	}
}