<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'user_type' => 'required|in:1',
            'country_id' => 'required_if:user_type,1',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'この項目は必須入力です',
            'email.email' => 'email形式で入力してください',
            'email.unique' => '入力されたメールアドレスはすでに登録されています',
            'password.required' => 'この項目は必須入力です',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'password.confirmed' => 'パスワードが確認用と一致していません',
            'user_type.required' => 'この項目は必須入力です',
            'country_id.required_if' => 'この項目は必須入力です',
        ];
    }
}