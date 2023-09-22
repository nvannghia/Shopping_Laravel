<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
            'name' => 'bail|required|min:5|max:255|unique:sliders',
            'description' => 'bail|required|min:5|max:255',
            'image' => 'bail|required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên slider bắt buộc nhập!',
            'name.unique' => 'Tên slider đã tồn tại!',
            'name.min' => 'Tên slider tối thiểu 5 kí tự!',
            'name.max' => 'Tên slider tối đa 255 kí tự!',
            'description.required' => 'Mô tả bắt buộc nhập!',
            'description.min' => 'Mô tả tối thiểu 5 kí tự!',
            'description.max' => 'Mô tả tối đa 255 kí tự!',
            'image' => 'Ảnh slider bắt buộc nhập!'
        ];
    }
}
