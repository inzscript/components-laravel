<?php

namespace App\Providers;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\DatabaseEloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Models\Job;
use App\Models\User;

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

        // Use Bootstrap pagination option in Laravel instead of Tailwind CSS
        // Paginator::useBootstrap();

        // Define a Gate to check if the authenticated user is the employer of the job
        Gate::define('edit-job', function (User $user, Job $job) {
            return $job->employer->user->is($user);
        });
    }
}
