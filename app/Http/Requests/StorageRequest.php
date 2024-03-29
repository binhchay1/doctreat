<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorageRequest extends FormRequest
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
            'quantity' => ['required'],
            'img' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'quantity.required' => 'Số lượng không được để trống.',
            'img.required' => 'Ảnh không được để trống.',
        ];
    }
}
