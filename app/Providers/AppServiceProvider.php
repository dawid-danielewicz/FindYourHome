<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\FindYourHome\Interfaces\FrontendRepositoryInterface::class, function(){
            return new \App\FindYourHome\Repositories\FrontendRepository();
        });

        $this->app->bind(\App\FindYourHome\Interfaces\BackendRepositoryInterface::class, function(){
            return new \App\FindYourHome\Repositories\BackendRepository();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer('frontend.*', function($view){
            $view->with('placeholder', asset('images/placeholder.jpg'));
        });
    }
}
