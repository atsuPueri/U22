<?php
namespace App\Library\User\usecase;

use App\Library\User\UserInterface;

interface SignInPort
{
    /**
     * @param string $id ログインID
     * @param string $password パスワード
     * @return ?UserInterface ログインに成功したらユーザーを返す、失敗時にnull
     *
     * 副作用としてログイン成功時自動ログイン用のクッキーを発行する。
     */
    public function signin(string $id, string $password): ?User;
}
