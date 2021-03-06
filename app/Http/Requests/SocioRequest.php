<?php

namespace App\Http\Requests;

use App\Socio;
use App\Rules\CampoUnicoRule;
use App\Rules\ValidarRutRule;
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
                'rut' => ['required','alpha_num','unique:socios,rut', new ValidarRutRule],
                'numero' => 'required|numeric|unique:socios,numero',
                'nombre1' => 'required|alpha',
                'nombre2' => 'nullable|alpha',
                'apellido1' => 'required|alpha',
                'apellido2' => 'nullable|alpha',
                'genero' => 'required|alpha',
                'fecha_nac' => 'nullable|date',
                'celular' => 'nullable|numeric',
                'correo' => 'nullable|email:rfc,dns|unique:socios,correo',
                'fecha_pucv' => 'nullable|date',
                'anexo' => 'nullable|numeric',
                'fecha_sind1' => 'nullable|date',
                'comuna_id' => 'required',
                'urbe_id' => 'nullable',
                'direccion' => 'nullable',
                'sede_id' => 'required',
                'area_id' => 'nullable',
                'cargo_id' => 'required',
                'ciudadania_id' => 'required',
            ];
        }else{
            return [
                'rut' => ['required','alpha_num', new ValidarRutRule, new CampoUnicoRule(obtenerIdDesdeRequestUri(Request()->requestUri), new Socio)],
                'numero' => ['required','numeric', new CampoUnicoRule(obtenerIdDesdeRequestUri(Request()->requestUri), new Socio)],
                'nombre1' => 'required|alpha',
                'nombre2' => 'nullable|alpha',
                'apellido1' => 'required|alpha',
                'apellido2' => 'nullable|alpha',
                'genero' => 'required|alpha',
                'fecha_nac' => 'nullable|date',
                'celular' => 'nullable|numeric',
                'correo' => ['nullable','email:rfc,dns', new CampoUnicoRule(obtenerIdDesdeRequestUri(Request()->requestUri), new Socio)],
                'fecha_pucv' => 'nullable|date',
                'anexo' => 'nullable|numeric',
                'fecha_sind1' => 'nullable|date',
                'comuna_id' => 'required',
                'urbe_id' => 'nullable',
                'direccion' => 'nullable',
                'sede_id' => 'required',
                'area_id' => 'nullable',
                'cargo_id' => 'required',
                'ciudadania_id' => 'required',
            ];            
        }
    }
}
