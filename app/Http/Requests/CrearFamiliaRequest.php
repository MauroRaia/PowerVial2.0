<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearFamiliaRequest extends FormRequest
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
        'nombre' => 'required|string|max:30'
      ];
    }

    public function messages()
    {
      return [
        'nombre.required' => 'la familia debe tener un nombre',
        'nombre.max' => 'el nombre no debe superar los 30 caracteres'
      ];
    }

}
