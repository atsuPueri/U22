<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserCheckController extends Controller
{
    public function show(Request $request)
    {
        $request->session()->keep([
            'name',
            'tel',
            'mail',
            'password',
        ]);

        \dump(session('password'));
        return view('user/userCheck',[
            'userName' => session('name'),
            'userTel' => session('tel'),
            'userMail' => session('mail'),
            'userPassword' => \str_repeat('●', \strlen(session('password'))),
        ]);
    }

}
