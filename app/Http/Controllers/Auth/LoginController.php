<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'この項目は必須入力です',
            'email.email' => 'email形式で入力してください',
            'password.required' => 'この項目は必須入力です',
        ]);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'email' => ['このメールアドレスは登録されていません'],
            ]);
        }

        throw ValidationException::withMessages([
            'password' => ['入力されたパスワードは登録された内容と違います'],
        ]);
    }
}