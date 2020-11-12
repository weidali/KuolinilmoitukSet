<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'obituary_firstname_1' => 'required|max:50',
            'obituary_lastname' => 'required|max:50',
            'obituary_birth_date'  => 'required',
            'obituary_date_of_death'  => 'required'
        ];
    }

    public function messages() {
        return [
            'obituary_firstname_1.required' => 'Kirjoita ensimmäinen etunimi',
            'obituary_lastname.required' => 'Kirjoita sukunimi',
            'obituary_birth_date.required' => 'Täydennä syntymäpäivä',
            'obituary_date_of_death.required' => 'Täydennä kuolinpäivä'
        ];
    }
}
