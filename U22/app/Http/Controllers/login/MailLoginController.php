<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use App\Library\User\usecase\SignIn\SignIn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MailLoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mail' => [
                'required',
                // 正規表現に適当なメールアドレスとしてこちらを採用している
                // https://qiita.com/sakuro/items/1eaa307609ceaaf51123
                "regex:/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/"
            ],
            'password' => ['required'],
        ], [
            'mail.required' => 'メールアドレスが空です、入力してください。',
            'mail.regex' => 'メールアドレスが適切な形式ではありません。',
            'password.required' => 'パスワードが空です、入力してください。'
        ]);

        // 失敗時true
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect('./login/mailLogin')
                ->with('errMail', $errors->first('mail'))
                ->with('errPass', $errors->first('password'));
        }

        /** @var SignIn */
        $SignIn = \resolve(SignIn::class);

        $mail_address = $request->input('mail', '');
        $password = $request->input('password', '');
        $is_login = $SignIn->signin_mail($mail_address, $password, SignIn::USER_TYPE_GENERAL);

        if (!$is_login) {
            return redirect('./login/mailLogin')
                ->with('errMail', 'ログインに失敗しました、メールアドレス、またはパスワードが間違っています。');
        }
        return 
    }
}
