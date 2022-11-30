<?php

class PageNotFound_Controller
{
	public $baseName = 'page_not_found';
	public function main(array $vars)
	{
		$view = new View_Loader($this->baseName);
	}
}

?>