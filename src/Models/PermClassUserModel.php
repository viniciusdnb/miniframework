<?php

namespace src\Models;

use src\Models\Core\AbstractCallModelCore;

class PermClassUserModel extends AbstractCallModelCore
{
	protected $table = "permClassUser";

	protected $columns = ["idPermClassUser", "idUser", "descClassPerm"];
}