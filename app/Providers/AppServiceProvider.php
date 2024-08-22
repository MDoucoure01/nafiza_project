<?php

namespace App\Providers;

use App\Models\Student;
use App\Models\User;
use App\Observers\StudentObserve;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
use View;

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
        // User::observe(UserObserver::class);
        Student::observe(StudentObserve::class);
        
    }

}
