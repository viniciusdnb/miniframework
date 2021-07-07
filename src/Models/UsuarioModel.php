<?php

namespace src\Models;

use src\Models\Core\AbstractModel;

class UsuarioModel extends AbstractModel
{

	protected $table = "usuario";
	
	protected $columns = ["idUsuario", "nome", "email"];

}

?>