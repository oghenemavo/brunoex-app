<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VerifyKycRequest extends FormRequest
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
            'first_name' => 'required|min:3|string',
            'last_name' => 'required|min:3|string',
            'email' => 'required|string|email',
            'phone' => 'required|min:3|string',
            'dob' => 'required|min:3|string',
            'address' => 'required|min:3|string',
            'address_alt' => 'nullable|min:3|string',
            'city' => 'required|min:3|string',
            'state' => 'required|min:3|string',
            'nationality' => 'required|min:3|string',
            'zip' => 'required|min:3|string',
            'selfie' => 'required|image|mimes:jpeg,jpg,png,gif',
            'document_type' => 'required',
            'document_front' => 'required|image|mimes:jpeg,jpg,png,gif',
            'document_back' => 'required|image|mimes:jpeg,jpg,png,gif',
        ];
    }
}
