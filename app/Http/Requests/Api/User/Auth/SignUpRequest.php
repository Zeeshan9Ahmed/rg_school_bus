<?php

namespace App\Http\Requests\Api\User\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
        $rules = [
            'type' => 'required|in:signin,signup',
            'email' => 'required|email',
            'first_name' => 'required_if:type,signup',
            'last_name' => 'required_if:type,signup'
        ];
    
        // Skip unique email validation for 'signin'
        if ($this->type === 'signup') {
            $rules['email'] .= '|unique:users,email';
        }
    
        return $rules;
    }

    
}
