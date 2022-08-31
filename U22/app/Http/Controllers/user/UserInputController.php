<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserInputController extends Controller
{
    public function show()
    {
        return view('user/userInput',[
            'errName' => '',
            'errTel' => '',
            'errMail' => '',
            'errPassword' => '',
        ]);
    }

    public function input(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userName' => ['required'],
            'userTel' => ['required','numeric','digits_between:10,11'],
            'userMail' => [
                'required',
                // 正規表現に適当なメールアドレスとしてこちらを採用している
                // https://qiita.com/sakuro/items/1eaa307609ceaaf51123
                "regex:/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/"
            ],
            'userPassword' => ['required'],
        ], [
            'userName.required' => '氏名が空です、入力してください。',
            'userTel.required' => '電話番号が空です、入力してください。',
            'userTel.numeric' => '適切な形式ではありません。',
            'userTel.digits_between' => '適切な形式ではありません。',
            'userMail.required' => 'メールアドレスが空です、入力してください。',
            'userMail.regex' => 'メールアドレスが適切な形式ではありません。',
            'userPassword.required' => 'パスワードが空です、入力してください。'
        ]);

        // 失敗時true
        if ($validator->fails()) {
            $errors = $validator->errors();
            return view('user/userInput', [
                'errName' => $errors->first('userName'),
                'errTel' => $errors->first('userTel'),
                'errMail' => $errors->first('userMail'),
                'errPassword' => $errors->first('userPassword'),
            ]);
        } else {
            return \redirect('/user/userCheck')
                ->with('name', $request->input('userName'))
                ->with('tel', $request->input('userTel'))
                ->with('mail', $request->input('userMail'))
                ->with('password', $request->input('userPassword'))
                ->with('profession', $request->input('profession'));
        }
    }

}
