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

	public function getNextPage() 
	{
		if (isset($_GET['p']))
		{
			$nextp = $_GET['p'] + 1;

			return $nextp;
		}
	}

	public function getPreviousPage()
	{
		if (isset($_GET['p']))
		{
			$previousp = $_GET['p'] - 1;

			return $previousp;
		}
	}
}