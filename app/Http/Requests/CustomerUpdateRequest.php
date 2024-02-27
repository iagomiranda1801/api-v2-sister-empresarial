<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class CustomerUpdateRequest extends BaseRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255', Rule::unique('customers', 'name')->ignore($this->customer)],
            'email' => ['required', 'string', 'email', 'max:255'],
            'responsible' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'to_aqui' => ['required', 'boolean'],
            'x_partner' => ['nullable', 'string', 'max:255', Rule::unique('customers', 'x_partner')->ignore($this->customer)],
        ];

        if ($this->to_aqui) {
            $rules['x_partner'] = ['required', 'string', 'max:255', Rule::unique('customers', 'x_partner')->ignore($this->customer)];
        }

        return $rules;
    }
}
