<?php
namespace App\Modules\Ticket\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTicketRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'numero'		=> 'required',
			'name'          => 'required|unique:tickets|alpha|max:255',
			'description'   => 'required',
			'email'   		=> 'required|unique:tickets,email',
			'estado'   		=> 'required',

		];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}
}
