<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email' => 'required|email|max:255',
            'password' => 'required|min:8'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Bạn chưa nhập vào ô email',
            'email.email' => 'Email chưa đúng định dạng. Ví dụ: Abc@gmail.com',
            'email.max' => 'Email không được vượt quá 255 ký tự',

            'password.required' => 'Bạn chưa nhập vào ô password',
            'password.min' => 'Password phải có ít nhất 8 ký tự',
        ];
    }
}
