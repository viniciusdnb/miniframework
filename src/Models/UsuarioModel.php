<?php

namespace src\Models;

use src\Models\Core\AbstractCallModelCore;

class UsuarioModel extends AbstractCallModelCore
{

	protected $table = "usuario";
	
	protected $columns = ["idUsuario", "nome", "email"];

}

?>