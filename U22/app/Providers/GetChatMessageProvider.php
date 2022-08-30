<?php
namespace App\Providers;

use App\Library\Chat\usecase\GetChatMessage\GetChatMessage;
use App\Library\Chat\usecase\GetChatMessage\GetChatMessageAdapter;
use Illuminate\Support\ServiceProvider;

class GetChatMessageProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(GetChatMessage::class, function () {
            return new GetChatMessage(new GetChatMessageAdapter());
        });
    }
}
