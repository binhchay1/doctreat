<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'min:9', 'max:11', 'regex:/(03|05|07|08|09|01)+([0-9])/'],
            'password' => ['nullable', 'string', 'min:8'],
            'password_confirmation' => ['same:password'],
            'year' => ['required'],
            'month' => ['required'],
            'day' => ['required'],
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
            'name.max' => 'Tên không vượt quá 100 kí tự.',
            'email.required' => 'Email không được để trống.',
            'email.string' => 'Email không đúng định dạng.',
            'email.email' => 'Email không đúng định dạng.',
            'email.max' => 'Email không vượt quá 255 kí tự.',
            'email.unique' => 'Email không được trùng.',
            'phone.required' => 'Số điện thoại không được để trống.',
            'phone.min' => 'Số điện thoại không được dưới 9 kí tự.',
            'phone.max' => 'Số điện thoại không vượt quá 11 kí tự.',
            'phone.regex' => 'Số điện thoại không đúng định dạng.',
            'password.string' => 'Mật khẩu không đúng định dạng.',
            'password.min' => 'Mật khẩu không được dưới 8 kí tự.',
            'password_confirmation.same' => 'Xác nhận mật khẩu không khớp.',
            'img.max' => 'Ảnh không vượt quá 4MB.',
            'year.required' => 'Năm không được để trống.',
            'month.required' => 'Tháng không được để trống.',
            'day.required' => 'Ngày dung không được để trống.',
        ];
    }
}
