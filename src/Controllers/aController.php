<?php

namespace src\Controllers;


use src\Route\RouterController;

class aController extends RouterController
{

	function a()
	{
		//$this->setData("array", array("a" => array('a' => "1", 'b' => "2")));
		$this->render("funcaoA");	
		//echo json_encode(["objJson" => ["a" =>1, "b"=>2]]);
		//$this->redirect("a/a");	
	}

	function d()
	{
		echo json_encode(array("a" => array('a' => "1", 'b' => "2")));
	}

	function index()
	{
		$this->render("index");
	}

	function red()
	{
		$this->redirect("a/a");
	}
}

?>