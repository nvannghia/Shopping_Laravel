<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|unique:users|min:5|max:255',
            'email' => 'required|unique:users|email:rfc,dns',
            'password' => 'required|max:255',
            'role_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên người dùng bắt buộc nhập!',
            'name.unique' => 'Tên người dùng đã tồn tại!',
            'name.min' => 'Tên người dùng tối thiểu 5 kí tự!',
            'name.max' => 'Tên người dùng tối đa 255 kí tự!',
            'email.required' => 'Email bắt buộc nhập!',
            'email.unique' => 'Email đã tồn tại!',
            'email.email' => 'Vui lòng nhập đúng định dạng email(VD: abc@gmail.com)',
            'password.required' => 'Mật khẩu bắt buộc nhập!',
            'role_id.required' => 'Vui lòng chọn vai trò người dùng!'
        ];
    }
}
