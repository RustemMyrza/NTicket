<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\LanguageMiddleware;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Регистрация singleton для middleware
        $this->app->singleton(LanguageMiddleware::class);
    }

    public function boot()
    {
        // Добавление middleware в группу 'web'
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('web', LanguageMiddleware::class);
    }
}