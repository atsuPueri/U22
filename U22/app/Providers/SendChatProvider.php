<?php
namespace App\Providers;

use App\Library\Chat\usecase\SendChat\SendChat;
use App\Library\Chat\usecase\SendChat\SendChatAdapter;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

class SendChatProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(SendChat::class, function () {
            return new SendChat(new SendChatAdapter(
                \resolve(Request::class)
            ));
        });
    }
}
