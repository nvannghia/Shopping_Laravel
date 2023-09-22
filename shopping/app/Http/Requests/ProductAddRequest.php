<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:products,name,NULL,id,deleted_at,NULL|max:255|min:5',
            'price' => 'required',
            'category_id' => 'required',
            'content' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên sản phẩm bắt buộc nhập!',
            'name.unique' => 'Tên sản phẩm đã tồn tại!',
            'name.min' => 'Tên sản phẩm tối thiểu 5 kí tự!',
            'name.max' => 'Tên sản phẩm tối đa 255 kí tự!',
            'price.required' => 'Giá sản phẩm bắt buộc nhập!',
            'category_id.required' => 'Danh mục sản phẩm bắt buộc nhập!',
            'content.required' => 'Nội dung sản phẩm bắt buộc nhập!'
        ];
    }
}
