<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AddChildRequest extends FormRequest
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
            'school_id' => [
                'required',
                Rule::exists('users', 'id')->where('role', 'school'),
            ],
            'first_name' => 'required',
            'last_name' => 'required',
            'class' => 'required',
            'roll_number' => 'required',
            'gender' => 'required|in:male,female',
            'dob' => 'required',
        ];
    }
}
