<?php

namespace App\Providers;

use App\Library\User\usecase\SignIn\SignIn;
use App\Library\User\usecase\SignIn\SignInAdapter;
use Illuminate\Support\ServiceProvider;

class SignInProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(SignIn::class, function () {
            return new SignIn(new SignInAdapter());
        });
    }
}
