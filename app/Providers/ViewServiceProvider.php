<?php

namespace App\Providers;


use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\View\Composers\MenuComposer;

class ViewServiceProvider extends ServiceProvider
{

    public function register()
    {
    }


    public function boot()
    {
        View::composer( 'header', MenuComposer::class);
    }
}
