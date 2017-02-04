<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FournisseurRequest extends FormRequest
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
          'nom' => 'required|max:100',
          'tel' => 'required|digits:8',
          'addresse' => 'max:200',
          'email' => 'required|email|unique:clients|max:100',
        ];
    }
}
