<?php

namespace App\Http\Requests\V1\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
//            'name' => ['required'],
//            'email' => ['required', 'email'],
//            'avatar' => ['nullable'],
//            'username' => ['required'],
//            'status' => ['required', Rule::in(['ACTIVE', 'PASSIVE'])],
//            'token' => ['nullable'],

            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'username' => 'required|string|max:255',
            'status' => 'required|in:ACTIVE,PASSIVE',
            'token' => 'nullable||string|max:255',

        ];
    }
}
