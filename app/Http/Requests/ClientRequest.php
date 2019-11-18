<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => "required|string|max:255",
            'surname' => "required|string|max:255",
            'email' => "required|email|max:255",
            'date_of_birth' => ["required", "string", "regex:/^([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))$/"],
            'phone_number' => "required|string|max:255",
            'address' => "required|string|max:255",
            'country' => "required|string|max:255",
        ];
    }
}
