<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerCreateRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'responsible' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'to_aqui' => ['required', 'boolean'],
            'x_partner' => ['nullable', 'string', 'max:255'],
        ];

        if ($this->to_aqui) {
            $rules['x_partner'] = ['required', 'string', 'max:255'];
        }

        return $rules;
    }
}
