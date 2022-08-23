<?php
namespace App\Providers;

use App\Library\LostItem\usecase\GetLostItem\GetLostItem;
use App\Library\LostItem\usecase\GetLostItem\GetLostItemAdapter;
use Illuminate\Support\ServiceProvider;

class GetLostItemProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(GetLostItem::class, function () {
            return new GetLostItem(new GetLostItemAdapter());
        });
    }

}

