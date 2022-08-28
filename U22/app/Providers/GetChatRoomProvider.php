<?php
namespace App\Providers;

use App\Library\Chat\usecase\GetChatRoom\GetChatRoom;
use App\Library\Chat\usecase\GetChatRoom\GetChatRoomAdapter;
use Illuminate\Support\ServiceProvider;

class GetChatRoomProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(GetChatRoom::class, function () {
            return new GetChatRoom(new GetChatRoomAdapter());
        });
    }

}
