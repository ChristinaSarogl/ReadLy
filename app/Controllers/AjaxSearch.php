<?php

namespace App\Controllers;

class AjaxSearch extends BaseController
{
	function fetch($input)
	{
		$modelBooks = model(BooksModel::class);
		$results['books'] = $modelBooks->searchTitle($input,5);
		$results['authors'] = $modelBooks->searchAuthor($input,5);
		$results['publishers'] = $modelBooks->searchPublisher($input,5);
		
		print(json_encode($results));
	}
 
}