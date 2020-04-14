<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SocioRequest extends FormRequest
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
        if(Request()->method === 'POST'){
            return [
                'rut' => ['required','unique:socios,rut'],
                'numero' => 'required|numeric|unique:socios,numero',
                'nombre1' => 'required|alpha',
                'nombre2' => 'nullable|alpha',
                'apellido1' => 'required|alpha',
                'apellido2' => 'nullable|alpha',
                'fecha_nac' => 'nullable|date',
                'celular' => 'nullable|numeric',
                'correo' => 'nullable|email:rfc,dns|unique:socios,email',
                'fecha_pucv' => 'nullable|date',
                'anexo' => 'nullable|numeric',
                'fecha_sind1' => 'nullable|date',
                'comuna_id' => 'required',
                'urbe_id' => 'nullable',
                'direccion' => 'nullable',
                'sede_id' => 'required',
                'area_id' => 'nullable',
                'cargo_id' => 'required',
                'nacionalidad_id' => 'required',
            ];
        }else{
            return [

            ];            
        }
    }
}
