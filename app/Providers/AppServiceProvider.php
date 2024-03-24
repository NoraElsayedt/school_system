<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Student\StudentRepository;
use App\Repository\Student\StudentRepositoryInterface;
use App\Repository\Teacher\TeacherRepository;
use App\Repository\Teacher\TeacherRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
