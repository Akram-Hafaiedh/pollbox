<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        // dd('test');
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            // 'password' => 'required|string|min:8',
            'mobile_number' => 'nullable|string|max:20',  // Adjust max length as needed
            // 'role'=>'user',
        ];
    }
}
