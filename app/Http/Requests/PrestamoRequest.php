<?php

namespace App\Http\Requests;

use App\Rules\ValidarRutRule;
use Illuminate\Foundation\Http\FormRequest;

class PrestamoRequest extends FormRequest
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
            'rut' => ['required','exists:socios','alpha_num', new ValidarRutRule],
            'fecha' => 'nullable|date',
            'registro' => 'required|numeric',
            'banca_id' => 'required',
            'metodo_id' => 'required',
            'cheque' => 'required|numeric',
            'monto' => 'required|numeric',
            'fecha_pago' => 'nullable|date|after:fecha',
            'cuotas' => 'nullable',
        ];    
    }
}
