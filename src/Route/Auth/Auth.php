<?php

namespace src\Route\Auth;

use Exception;
use src\Models\UserModel;
use src\Models\HashModel;
use src\Models\PermUserModel;

class Auth
{
	private $user;
	private $hash;	
	private $perm;

	public function searchUser(string $name)
	{
		//instancia um model usuario
		$userModel = new UserModel;
		
		$searchUser = $userModel->select("nameUser = '$name'");
		
		if(count($searchUser))
		{
			$this->user = $searchUser[0];
			$this->seachUserIdHash($searchUser[0]->idUser);
			return true;
		}
		else
		{
			return false;
		}
	}

	private function seachUserIdHash($idUser)
	{
		$hashModel = new HashModel;

		$hashId = hash("md5", $idUser);

		$this->hash = $hashModel->select("id = '$hashId'")[0];
	}	

	private function searchPermUser($idUser)
	{
		$permModelUser = new PermUserModel;

		$this->perm = $permModelUser->select("idUser = '$idUser'")[0];
	}

	private function getPerm()
	{
		return $this->perm;
	}

	private function getUser()
	{
		return $this->user;
	}

	private function getHash()
	{
		return $this->hash;
	}

	public function verifPass($password)
	{
		if(!empty($this->getUser()) && !empty($this->getHash()))
		{
			if(password_verify($password, $this->getHash()->hash))
			{
				$this->setSession();
				return true;
			}
			else
			{	
				session_destroy();
				return false;
			}
		}
		else
		{
			
			throw new Exception("Erro desconhecido ao verificar acesso de ususario", 500);
		}
	}

	private function setSession()
	{
	
		/*$_SESSION["user"] = $this->getUser()->nameUser;
		$_SESSION["class"] = ["portifolio"];
		$_SESSION["action"] = ["index", "portifolio"];
		$_SESSION["auth"] = true;*/
	}

}