<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Library\Helper\GetNowLoginUser;
use App\Library\User\UserGeneral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserProfileEditController extends Controller
{
    public function show()
    {
        /** @var GetNowLoginUser */
        $GetUser = new GetNowLoginUser();
        /** @var UserGeneral */
        $user = $GetUser->get(GetNowLoginUser::TYPE_GENERAL);

        if (null === $user) {
            return redirect('/login/mailLogin');
        }

        return view('user/userProfileEdit' , [
            'edit' => [//valueが情報,errMsgがエラー文
                'account' => ['value' => $user->display_name , 'errMsg' => ''],//アカウント名
                'mail' => ['value' => $user->mail_address , 'errMsg' => ''],//メアド
                'tell' => ['value' => $user->phone_number , 'errMsg' => ''],//電話番号
                'pass' => ['value' => '' , 'errMsg' => ''],//パスワード
                'icon' => ['value' => $user->icon_name , 'errMsg' => '']//アイコン
            ]
        ]);
    }

    public function edit(Request $request)
    {
        /** @var GetNowLoginUser */
        $GetUser = new GetNowLoginUser();
        /** @var UserGeneral */
        $user = $GetUser->get(GetNowLoginUser::TYPE_GENERAL);

        if (null === $user) {
            return redirect('/login/mailLogin');
        }

        $update = [];

        // 画像アップの処理
        $file_key = 'icon';
        if ($request->hasFile($file_key)) {
            $file = $request->file($file_key);
            $path = $file->store("images\user\\", 'public');
            $update['icon_name'] = $path;
        }

        $update['display_name'] = $request->input('accountName');
        $update['mail_address'] = $request->input('mail');
        $update['phone_number'] = $request->input('tell');


        // 空の時以外はパスワードを変更する
        if ($request->input('password') !== null && $request->input('password') !== '') {
            $update['password'] = password_hash($request->input('password'), PASSWORD_DEFAULT);
        }

        DB::table('user_general')->update($update);

        return redirect('/user/userProfile');
    }
}
