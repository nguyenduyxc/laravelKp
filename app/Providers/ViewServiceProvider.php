<?php

namespace App\Providers;


use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\View\Composers\MenuComposer;
use App\View\Composers\CartComposer;

class ViewServiceProvider extends ServiceProvider
{

    public function register()
    {
    }


    public function boot()
    {
        View::composer( 'header', MenuComposer::class);
        View::composer( 'cart', CartComposer::class);
    }
}
