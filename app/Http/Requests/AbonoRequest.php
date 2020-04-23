<?php

namespace App\Http\Requests;

use App\Rules\MontoRule;
use Illuminate\Foundation\Http\FormRequest;

class AbonoRequest extends FormRequest
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
            'fecha' => 'required|date|after:fecha_solicitud',
            'monto' => ['required','numeric', new MontoRule(Request()->prestamo_id)],
            'fecha_solicitud' => 'required|date',
            'prestamo_id' => 'required',
        ];
    }
}
