<?php

namespace src\Models;

use src\Models\Core\AbstractCallModelCore;

class HashModel extends AbstractCallModelCore
{
	protected $table = "hash";

	protected $columns = ["idHash", "id", "hash"];

}	