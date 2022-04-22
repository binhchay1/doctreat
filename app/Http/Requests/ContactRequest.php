<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255'],
            'title' => ['required', 'string'],
            'message' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống.',
            'name.string' => 'Tên không đúng định dạng.',
            'name.regex' => 'Tên không đúng định dạng.',
            'name.max' => 'Tên không vượt quá 255 kí tự.',
            'email.required' => 'Email không được để trống.',
            'email.string' => 'Email không đúng định dạng.',
            'email.email' => 'Email không đúng định dạng.',
            'email.max' => 'Email không vượt quá 255 kí tự.',
            'title.required' => 'Tiêu đề không được để trống.',
            'title.string' => 'Tiêu đề không đúng định dạng.',
            'message.string' => 'Nội dung không được để trống.',
        ];
    }
}
