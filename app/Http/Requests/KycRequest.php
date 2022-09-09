<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KycRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'address' => 'required|min:3|string',
            'address_two' => 'nullable|min:3|string',
            'city' => 'nullable|min:3|string',
            'state' => 'required|min:3|string',
            'zip' => 'nullable|min:3|string',
            'country' => 'required|min:3|string',
            'nation' => 'nullable|min:3|string',
        ];
    }
}
