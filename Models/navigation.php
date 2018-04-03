<?php

class Navigation
{
	public function CountNbPages($totalElements, $elementsPerPage)
	{
		$nbPages = ceil($totalElements/$elementsPerPage);

		return $nbPages;
	}

	public function getCurrentPage($totalElements, $elementsPerPage)
	{
		if(isset($_GET['p'])) 
		{
    		$currentPage = intval($_GET['p']);
 
     		if(($currentPage * $elementsPerPage - $elementsPerPage) > $totalElements)
     		{
				$currentPage = 1;
     		}
		}
		else 
		{
    		$currentPage = 1;     
		}

		return $currentPage;
	}

	public function getFirstEntrance($currentPage, $elementsPerPage)
	{
		$firstEntrance = ($currentPage - 1) * $elementsPerPage;

		return $firstEntrance;
	}
}