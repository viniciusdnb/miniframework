<?php

namespace src\Models;

use src\Models\Core\AbstractCallModelCore;

class UserModel extends AbstractCallModelCore
{

	protected $table = "user";
	
	protected $columns = ["idUser", "nameUser"];

}

?>