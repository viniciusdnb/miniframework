<?php

namespace src\Route\Auth;

use Exception;
use src\Models\UserModel;
use src\Models\HashModel;
use src\Models\PermActionUserModel;
use src\Models\PermClassUserModel;

class Auth
{
	private $user;
	private $hash;	
	private $permClassModel;
	private $permActionModel;
	private $permClass;
	private $permAction;

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

	private function searchPermClassUser($idUser)
	{
		$permClassModelUser = new PermClassUserModel;

		$this->permClassModel = $permClassModelUser->select("idUser = '$idUser'");

		$this->setPermClass();
	}

	private function setPermClass()
	{
		foreach($this->getPermClassModel() as $value)
		{
			$permClass[] = $value->descClassPerm;	
		}

		$this->permClass = $permClass;
	}

	private function getPermClass()
	{
		return $this->permClass;
	}

	private function getPermClassModel()
	{
		return $this->permClassModel;
	}

	private function searchPermActionUser($idUser)
	{
		$permActionModelUser = new PermActionUserModel;
		$this->permActionModel = $permActionModelUser->select("idUser = '$idUser'");
		$this->setPermAction();
	}

	private function setPermAction()
	{
		foreach($this->getPermActionModel() as $value)
		{
			$permAction[] = $value->descActionPerm;
		}

		$this->permAction = $permAction;
	}
	
	private function getPermActionModel(){
		return $this->permActionModel;
	}

	private function getPermAction()
	{
		return $this->permAction;
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
		$this->searchPermClassUser($this->user->idUser);
		$this->searchPermActionUser($this->user->idUser);

		//setar a sessao com os dados do usuario
		$_SESSION["user"] = $this->getUser()->nameUser;
		$_SESSION["class"] = $this->getPermClass();
		$_SESSION["action"] = $this->getPermAction();
		$_SESSION["auth"] = true;
	}

}