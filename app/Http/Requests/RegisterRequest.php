<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        'password' => 'required|min:8|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/',
        'name' => 'required|alpha_num|min:5|max:20|unique:users,name',
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
        'password.regex' => 'Password phải chứa ít nhất một chữ cái thường, một chữ cái hoa, một chữ số và một ký tự đặc biệt (@$!%*#?&)',
        
        'name.required' => 'Bạn chưa nhập vào ô name',
        'name.alpha_num' => 'name chỉ được chứa chữ cái và số',
        'name.min' => 'name phải có ít nhất 5 ký tự',
        'name.max' => 'name không được vượt quá 20 ký tự',
        'name.unique' => 'name đã tồn tại, vui lòng chọn tên khác',
    ];
}
}
