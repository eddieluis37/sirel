<?php

namespace App\Modules\Ticket\Repositories;

use App\Modules\Ticket\Models\Type;

/**
 * @author amaytagalog <amaytagalogatyahoodatcom>
 */

class TypeRepository
{

	protected $allTypes;

	public function getAllCreatedTypes()
	{
		$allTypes = Type::orderBy('id','DESC')->paginate(5);

		return $this->allTypes;
	}

	public function getAllTypes()
	{
		$allTypes= Type::all();

		return $this->allTypes;
	}
}