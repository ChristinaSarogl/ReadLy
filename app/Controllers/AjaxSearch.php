<?php

namespace App\Controllers;

class AjaxSearch extends BaseController
{
	function fetch($input)
	{
		$modelBooks = model(BooksModel::class);
		$results = $modelBooks->fetchSearch($input);
		
		print(json_encode($results));
	}
 
}