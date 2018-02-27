<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtletaRequest extends FormRequest
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
            'afiliado.required'   => 'El campo :attribute es obligatorio.', 
            'afiliado.unique'     => 'El :attribute seleccionado ya ha sido registrado.', 
        ];
    }

    public function attributes(){
        return [
            'afiliado' => 'afiliado'
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
                    'afiliado' => 'required|unique:atletas'
                ];
            }
            case 'PUT': {
                return [
                    'afiliado' => 'required'
                ];
            }
            case 'PATCH': { return []; }
            default:break;
        }
    }
}
