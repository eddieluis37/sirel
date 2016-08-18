<?php

namespace App\Modules\Ticket\Repositories;

use App\Modules\Ticket\Models\Importance;

/**
 * @author amaytagalog <amaytagalogatyahoodatcom>
 */

class ImportanceRepository
{
	private $importances;

	public function getAllCreatedImportances()
	{
		$this->importances = Importance::orderBy('id','DESC')->paginate(5);

		return $this->importances;
	}

	public function getAllImportances()
	{
		$this->importances= Importance::all();

		return $this->importances;
	}
}