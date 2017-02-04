<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PieceRechangeRequest extends FormRequest
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
          'reference' => 'required|digits:80|unique:pieces_rechange',
          'marque' => 'required|max:80',
          'prix' => 'required|numeric|min:0',
          'type' => 'required|max:80',
          'libelle' => 'required|max:100',
          'quantity' => 'required|integer|min:0',
        ];
    }
}
