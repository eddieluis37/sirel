<?php


namespace App\Modules\Ticket\Repositories;

use App\Modules\Ticket\Models\Section;

/**
 * @author amaytagalog <amaytagalogatyahoodatcom>
 */

class SectionRepository
{
	private $sections;

	public function getAllCreatedSections()
	{
		$this->sections = Section::orderBy('id','DESC')->paginate(5);

		return $this->sections;
	}

	public function getAllSections()
	{
		$this->sections= Section::all();

		return $this->sections;
	}
}