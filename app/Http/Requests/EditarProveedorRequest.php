<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditarProveedorRequest extends FormRequest
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
          'tipo_identificacion_fiscal' => 'required|string',
          'numero_identificacion_fiscal' => 'required',
          'razon_social' => 'required|string|max:125',
          'nombre_comercial' => 'required|string|max:100',
          'domicilio' => 'required|string|max:100',
          'pais' => 'required|string|max:75',
          'provincia' => 'required|string|max:75',
          'localidad' => 'required|string|max:75',
          'codigo_postal' => 'required|min:0',
          'telefono' => 'max:15',
          'movil' => 'max:15',
          'nombre_contacto' => 'max:100',
          'email' => 'required|email',
          'direccion_web' => 'max:50'
        ];
    }

    public function messages()
    {
        return [
          'tipo_identificacion_fiscal.required' => 'un proveedor debe tener un tipo de ident. fiscal',
          'numero_identificacion_fiscal.required' => 'un proveedor debe tener un numero de ident. fiscal',
          'razon_social.required' => 'un proveedor debe tener una razon social',
          'nombre_comercial.required' => 'un proveedor debe tener un nombre comercial',
          'nombre_comercial.max' => 'el nombre comercial no debe superar los 100 caracteres',
          'domicilio.max' => 'el domicilio no debe superar los 100 caracteres',
          'pais.max' => 'el pais no debe superar los 75 caracteres',
          'provincia.max' => 'la provincia no debe superar los 75 caracteres',
          'codigo_postal.min' => 'codigo postal invalido: numero negativo',
          'telefono.max' => 'el telefono no debe superar los 15 caracteres',
          'movil.max' => 'el movil no debe superar los 15 caracteres',
          'fax.max' => 'el fax no debe superar los 20 caracteres',
          'email.email' => 'debe ingresar una direccion de email valida',
          'email.required' => 'un proveedor debe tener una direccion email',
          'direccion_web.max' => 'la direccion web no superar los 50 caracteres'
        ];
    }

}
