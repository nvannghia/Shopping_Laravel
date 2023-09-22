<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingAddRequest extends FormRequest
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
            'config_key' => 'bail|required|unique:settings|max:255',
            'config_value' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'config_key.required' => 'Bắt buộc nhập config key!',
            'config_key.unique' => 'Config key đã tồn tại!',
            'config_key' => 'Config key tối đa 255 kí tự!',
            'config_value.required' => 'Config value bắt buộc nhập!'
        ];
    }
}
