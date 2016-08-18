<?php

namespace App\Modules\Ticket\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class SectionRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
         //return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      
        return [
            'section'       => 'required|regex:/^[\pL\s\-]+$/u|min:2|max:20',
        ];
    }
}
