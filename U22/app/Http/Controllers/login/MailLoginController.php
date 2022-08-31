<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use App\Library\User\usecase\SignIn\SignIn;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class MailLoginController extends Controller
{
    public function show()
    {
        return view('login/mailLogin');
    }

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
            'profession' => ['required'],
        ], [
            'mail.required' => 'メールアドレスが空です、入力してください。',
            'mail.regex' => 'メールアドレスが適切な形式ではありません。',
            'password.required' => 'パスワードが空です、入力してください。',
            'profession.required' => 'どちらでログインするか選択してください。',
        ]);

        // 失敗時true
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect('./login/mailLogin')
                ->with('errMail', $errors->first('mail'))
                ->with('errPass', $errors->first('password'))
                ->with('errPro', $errors->first('profession'));
        }

        /** @var SignIn */
        $SignIn = \resolve(SignIn::class);

        $mail_address = $request->input('mail', '');
        $password = $request->input('password', '');

        if ($request->input('profession') === 'user') {
            $type = SignIn::USER_TYPE_GENERAL;
        } elseif ($request->input('profession') === 'manager') {
            $type = SignIn::USER_TYPE_SHOP;
        } else {
            return redirect('/login/mailLogin');
        }

        $is_login = $SignIn->signin_mail($mail_address, $password, $type);

        if (!$is_login) {
            return redirect('./login/mailLogin')
                ->with('errMail', 'ログインに失敗しました、メールアドレス、またはパスワードが間違っています。');
        }

        if ($type === SignIn::USER_TYPE_GENERAL) {
            return \redirect('/user/search');
        }
        return \redirect('/manager/managerLostList');

    }
}
