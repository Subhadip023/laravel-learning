<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        // If you want to authorize all users, return true
        return true;

        // If you want to check if the user is authorized (e.g., for admins):
        // return auth()->user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',        
            'password' => 'required|string|min:8|confirmed',       
            'phone_no' => 'required|digits:10',                    
        ];
    }

    /**
     * Get custom attributes for validation errors.
     *
     * @return array
     */
   
}
