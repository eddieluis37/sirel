<?php

namespace App\Modules\Ticket\Repositories;

use App\Modules\Ticket\Models\Ticket;

/**
 * @author amaytagalog <amaytagalogatyahoodatcom>
 */

class TicketRepository
{
	private $allTickets;

	public function getAllTickets()
	{
		$this->allTickets = Ticket::orderBy('id','DESC')->paginate(10);
		if (count($this->allTickets) > 0) {
			return $this->allTickets;
		} else {
			var_dump($this->allTickets);
		}

		return $this->allTickets;
	}

	public function getAllTicketsGroupImportance()
	{
		$this->allTickets = Ticket::groupBy('importance_id')
			->orderBy('sname','DESC')
			->get();

		return $this->allTickets;
	}
}