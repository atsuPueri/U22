<?php

namespace App\Providers;

use App\Library\User\usecase\SignUp\SignUp;
use App\Library\User\usecase\SignUp\SignUpAdapter;
use Illuminate\Support\ServiceProvider;

class SignUpProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(SignUp::class, function () {
            return new SignUp(new SignUpAdapter());
        });
    }
}
