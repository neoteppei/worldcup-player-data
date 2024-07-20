<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $countries = [
            1 => 'ブラジル',
            2 => 'メキシコ',
            3 => 'カメルーン',
            4 => 'クロアチア',
            5 => 'スペイン',
            6 => 'オランダ',
            7 => 'チリ',
            8 => 'オーストラリア',
            9 => 'コロンビア',
            10 => 'ギリシャ',
            11 => 'コートジボワール',
            12 => '日本',
            13 => 'ウルグアイ',
            14 => 'コスタリカ',
            15 => 'イングランド',
            16 => 'イタリア',
            17 => 'スイス',
            18 => 'エクアドル',
            19 => 'フランス',
            20 => 'ホンジュラス',
            21 => 'アルゼンチン',
            22 => 'ボスニア・ヘルツェゴビナ',
            23 => 'イラン',
            24 => 'ナイジェリア',
            25 => 'ドイツ',
            26 => 'ポルトガル',
            27 => 'ガーナ',
            28 => '米国',
            29 => 'ベルギー',
            30 => 'アルジェリア',
            31 => 'ロシア',
            32 => '韓国',
        ];
        return view('auth.register', compact('countries'));
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        return redirect()->route('login')->with('success', 'ユーザー登録が完了しました。ログインしてください。');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'user_type' => 'required|in:0,1',
            'country_id' => 'required_if:user_type,1',
        ], [
            'email.required' => 'この項目は必須入力です',
            'email.email' => 'email形式で入力してください',
            'email.unique' => '入力されたメールアドレスはすでに登録されています',
            'password.required' => 'この項目は必須入力です',
            'password.min' => 'パスワードは8文字以上で入力してください',
            'password.confirmed' => 'パスワードが確認用と一致していません',
            'user_type.required' => 'この項目は必須入力です',
            'country_id.required_if' => 'この項目は必須入力です',
        ]);
    }

    protected function create(array $data)
    {

        return User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['user_type'] == '1' ? 1 : 0,
            'country_id' => $data['user_type'] == '1' ? $data['country_id'] : 0,
        ]);
    }
}
