<?php

namespace App\Providers;

<<<<<<< HEAD
use App\Models\Student;
use App\Models\User;
use App\Observers\StudentObserve;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;
use View;
=======
use Illuminate\Support\ServiceProvider;
>>>>>>> bcc3e1df25726a20f9ea9081bc5085bd70630e9d

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
<<<<<<< HEAD
        User::observe(UserObserver::class);
        Student::observe(StudentObserve::class);

    }

=======
        //
    }
>>>>>>> bcc3e1df25726a20f9ea9081bc5085bd70630e9d
}
