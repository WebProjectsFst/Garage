<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
    public function rules()
    {
        return [
          'NSS' => 'required|digits:8|unique:employees',
          'nom' => 'required|max:100',
          'prenom' => 'required|max:100',
          'DN' => 'required|date',
          'CIN' => 'required|digits:8|unique:employees'
          'SF' => 'required|max:20',
          'addresse' => 'max:200',
          'tel' => 'required|digits:8|unique:employees',
          'type' => 'required|digits:11',
          'salaire' => 'required|numeric|min:0',
        ];
    }
}
