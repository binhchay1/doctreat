<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255','unique:products'],
            'price' => ['required'],
            'description' => ['required','max:255'],
            'img' => ['required'],
            'type' => ['required','max:40']
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'Tên không được trùng.',
            'name.required' => 'Tên không được để trống.',
            'name.string' => 'Tên không đúng định dạng.',
            'name.max' => 'Tên không vượt quá 255 kí tự.',
            'price.required' => 'Gía không được để trống.',
            'description.required' => 'Nội dung không được để trống.',
            'description.max' => 'Nội dung không vượt quá 255 kí tự.',
            'image.required' => 'Ảnh không được để trống.',
            'type.required' => 'Loại không được để trống.',
            'type.max' => 'Loại không vượt quá 40 kí tự.'
        ];
    }
}
