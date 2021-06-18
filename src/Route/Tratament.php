<?php

namespace src\Route;

class Tratament
{

	protected $url;

	function __construct()
	{
		if(isset($_GET["url"]))
		{
			$strUrl = rtrim($_GET["url"], "/");
			$this->url = preg_replace("/[^a-zA-Z0-9\/]/", "", $strUrl);
		}else{
			$this->url = false;
		}
				
	}

	function getUrl()
	{
		return $this->url;
	}
}


?>
