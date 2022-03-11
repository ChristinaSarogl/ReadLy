<?php

namespace App\Models;

use CodeIgniter\Model;

class BooksModel extends Model
{
    protected $table = 'books';
	
	protected $allowedFields = ['title', 'author', 'summary',
		'publisher','release_date','slug'];
	
	public function getBooks($slug = false)
	{
		if ($slug === false) {
			return $this->findAll();
		}

		return $this->where(['slug' => $slug])->first();
	}
}