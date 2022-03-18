<?php

namespace App\Controllers;

class AjaxSearch extends BaseController
{
	function fetch($input)
	{
		$modelBooks = model(BooksModel::class);
		$results['books'] = $modelBooks->searchTitle($input);
		$results['authors'] = $modelBooks->searchAuthor($input);
		$results['publishers'] = $modelBooks->searchPublisher($input);
		
		print(json_encode($results));
	}
 
}