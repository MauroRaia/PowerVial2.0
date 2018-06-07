<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditarSubfamiliaRequest extends FormRequest
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
          'nombre' => 'required|string|max:50',
          'familia_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
          'nombre.required' => 'la subfamilia debe tener un nombre',
          'nombre.max' => 'el nombre no debe superar los 50 caracteres',
          'familia_id.required' => 'la subfamilia debe tener una familia'
        ];
    }

}
