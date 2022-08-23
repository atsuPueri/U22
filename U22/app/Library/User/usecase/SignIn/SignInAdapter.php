<?php
namespace App\Library\User\usecase;

use App\Library\User\UserFactory;
use App\Library\User\usecase\SignInPort;
use Illuminate\Support\Facades\DB;
use UserGeneral;

use function password_verify;

use const null;

class SignInDBAdapter implements SignInPort
{

    public function signin(string $id, string $password): ?User
    {
        $result = DB::table('user')->where('id', '=', $id)->get();


        $hash = $result->hash_password;

        if (password_verify($password, $hash)) {


            return new UserGeneral($result);
        }

        return null;
    }
}
