<?php

namespace src\Models;

use src\Models\Core\AbstractCallModelCore;

class PermUserModel extends AbstractCallModelCore
{
	protected $table = "permUser";

	protected $columns = ["idPermUser", "idUser", "descPerm"];
}