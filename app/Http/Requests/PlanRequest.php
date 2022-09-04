<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanRequest extends FormRequest
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
            'plan_name' => 'required|string',
            'profit_type' => 'required|string',
            'profit' => 'required|numeric',
            'min_deposit' => 'required|numeric|min:0.1',
            'max_deposit' => 'required|numeric|min:0.1',
            'duration_unit' => 'required|in:daily,weekly,monthly,annually',
            'duration' => 'required|numeric|min:1',
            'description' => 'nullable|string|min:10',
        ];
    }
}
