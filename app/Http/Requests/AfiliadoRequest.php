<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AfiliadoRequest extends FormRequest
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

    public function messages(){
        return [
            'cedula.required'   => 'El campo :attribute es obligatorio.', 
            'cedula.unique'     => 'La :attribute ingresada ya ha sido registrado.', 
        ];
    }

    public function attributes(){
        return [
            'cedula' => 'cédula'
        ];
    }

    public function response(array $errors){
        if ($this->expectsJson()){
            return response()->json([
                'validations'   => false, 
                'errors'        => $errors
            ]);
        }

        return $this->redirector->to($this->getRedirectUrl())
        ->withInput($this->except($this->dontFlash))
        ->withErrors($errors, $this->errorBag);
    }

    public function rules(){
        switch($this->method())
        {
            case 'GET':
            case 'DELETE': { return []; }
            case 'POST': {
                return [
                    'cedula' => 'required|unique:afiliados'
                ];
            }
            case 'PUT': {
                return [
                    'cedula' => 'required'
                ];
            }
            case 'PATCH': { return []; }
            default:break;
        }
    }
}
