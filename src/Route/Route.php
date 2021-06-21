<?php

namespace src\Route;

class Route
{

	protected $route = [];


	protected function setRoute($route)
	{
		$path = rtrim($route, "/");

		$path = preg_replace("/[^a-zA-Z\/]/", "", $route);
		
		$path = explode("/", $path);

		$this->route[0] = $path[0];
		$this->route[1] = $path[1];

	}

	protected function getRoute()
	{
		return $this->route;
	}
}

?>