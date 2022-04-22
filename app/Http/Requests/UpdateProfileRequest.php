<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => ['required', 'string', 'regex:/^[\pL\s]+$/u', 'max:100'],
            'phone' => ['required', 'min:9', 'max:11', 'regex:/(03|05|07|08|09|01)+([0-9])/'],
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống.',
            'name.string' => 'Tên không đúng định dạng.',
            'name.regex' => 'Tên không đúng định dạng.',
            'name.max' => 'Tên không vượt quá 255 kí tự.',
            'phone.required' => 'Số điện thoại không được để trống.',
            'phone.min' => 'Số điện thoại không được dưới 9 kí tự.',
            'phone.max' => 'Số điện thoại không vượt quá 11 kí tự.',
            'phone.regex' => 'Số điện thoại không đúng định dạng.',
        ];
    }
}
