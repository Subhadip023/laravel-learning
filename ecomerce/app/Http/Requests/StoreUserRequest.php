<?php

namespace App\Http\Requests;

use Hash;
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
            'password' => 'required|string|min:8|max:16 | confirmed',       
            'phone' => 'required|digits:10',  
            'Gender'=>'required'  ,       
            'hobbies'  => 'required|array'      ,
        ];
    }

    /**
     * Get custom attributes for validation errors.
     *
     * @return array
     */
   
}
