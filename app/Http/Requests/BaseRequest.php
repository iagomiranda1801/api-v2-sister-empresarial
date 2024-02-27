<?php


// app/Http/Requests/BaseRequest.php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseRequest extends FormRequest
{

    protected $stopOnFirstFailure = true;


    // Método authorize comum ou outras lógicas comuns podem ser colocadas aqui
    
    public function authorize()
    {
        // Lógica de autorização padrão
        return true;
    }

    // Você também pode adicionar métodos comuns de manipulação de erro ou personalização de mensagens de erro aqui

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = response()->json(
            $validator->errors()
        , 422);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
    
}

