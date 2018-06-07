<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CrearArticuloRequest extends FormRequest
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
          'codigo' => 'required|string|max:20',
          'nombre' => 'required|string|max:50',
          'descripcion' => 'required|string',
          'categoria' => 'required|string',
          'stock' => 'required|integer|min:0',
          'proveedor_id' => 'required',
          'marca_maquina_id' => 'required',
          'familia_id' => 'required',
          'subfamilia_id' => 'required',
          'imagen' => 'image',
          'precio_compra' => 'required|integer|min:0',
          'precio_venta' => 'required|integer|min:0',
          'modelos_articulos' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'stock.integer' => 'el stock debe ser un numero',
            'stock.min' => 'el stock debe ser mayor a 0',
            'codigo.required' => 'el articulo debe tener un codigo',
            'codigo.max' => 'el codigo no debe superar los 20 caracteres',
            'nombre.required' => 'el articulo debe tener un nombre',
            'nombre.max' => 'el nombre no debe superar los 50 caracteres',
            'stock.required' => 'el articulo debe tener stock',
            'proveedor_id.required' => 'el articulo debe tener un proveedor',
            'marca_maquina_id.required' => 'el articulo debe tener una marca',
            'subfamilia_id.required' => 'el articulo debe tener una subfamilia',
            'familia_id.required' => 'el articulo debe pertenecer a una familia',
            'imagen.image' => 'el archivo subido debe ser una imagen',
            'precio_compra.required' => 'el articulo debe tener un precio de compra',
            'precio_compra.integer' => 'el precio de compra debe ser un numero',
            'precio_compra.min' => 'el precio de compra debe ser mayor a 0',
            'precio_venta.required' => 'el articulo debe tener un precio de venta',
            'precio_venta.integer' => 'el precio de venta debe ser un numero',
            'precio_venta.min' => 'el precio de venta debe ser mayor a 0',
            'modelos_articulos.required' => 'el articulo debe tener, por lo menos, un modelo'

          ];
    }

}
