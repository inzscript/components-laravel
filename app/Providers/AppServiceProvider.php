<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\DatabaseEloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        EloquentModel::preventLazyLoading();
    }
}
