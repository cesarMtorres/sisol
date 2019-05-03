<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgremiadoRequest extends FormRequest
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
            //
            'nombre' =>'required|min:3|max:50',
            'cedula' =>'required|min:6|max:8|unique:persona',
            'apellido' =>'required|min:6|max:50',
            'civ'         => 'max:10|required|unique:agremiado',
            'direccion' =>'required|min:5|max:150',
            'solvencia' => 'required',
           // 'telefono' =>'required|min:11|max:12|',
            'correo' =>'required|min:3|max:50',
            'fecha_nacimiento' =>'required',
            'trabajo' =>'required|min:6|max:50'
        ];
    }
}
