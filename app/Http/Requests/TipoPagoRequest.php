<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoPagoRequest extends FormRequest
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
            'nombre' => 'min:8|max:20|required|unique:tipo_pago'
        ];
    }
}
