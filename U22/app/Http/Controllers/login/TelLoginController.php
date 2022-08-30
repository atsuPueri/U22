<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Library\User\usecase\SignIn\SignIn;

class TelLoginController extends Controller
{

    public function show()
    {
        return view('login/telLogin',[
            'errTel' => '',
            'errPass' => '',
        ]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tel' => [
                'required','numeric','digits_between:10,11'
                ],
            'password' => ['required'],
        ], [
            'tel.required' => '電話番号が空です、入力してください。',
            'tel.regex' => '電話番号が適切な形式ではありません。',
            'password.required' => 'パスワードが空です、入力してください。'
        ]);

        // 失敗時true
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect('./login/telLogin')
                ->with('errTel', $errors->first('tel'))
                ->with('errPass', $errors->first('password'));
        }

        /** @var SignIn */
        $SignIn = \resolve(SignIn::class);

        $phone = $request->input('tel', '');
        $password = $request->input('password', '');
        $token_cookie = $SignIn->signin_phone($phone, $password, SignIn::USER_TYPE_GENERAL);

        if (!$token_cookie) {
            return redirect('./login/telLogin')
                ->with('errTel', 'ログインに失敗しました、メールアドレス、またはパスワードが間違っています。');
        }
    }

}
