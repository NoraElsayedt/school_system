<?php

namespace App\Providers;

use App\Models\Payment;
use App\Repository\Fee\FeeRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Payment\PaymentRepository;
use App\Repository\Student\StudentRepository;
use App\Repository\Teacher\TeacherRepository;
use App\Repository\Fee\FeeRepositoryInterface;
use App\Repository\Graduated\GraduatedRepository;
use App\Repository\Promotion\PromotionRepository;
use App\Repository\Processings\ProcessingRepository;
use App\Repository\Fee_Invoice\Fee_InvoiceRepository;
use App\Repository\Payment\PaymentRepositoryInterface;
use App\Repository\Student\StudentRepositoryInterface;
use App\Repository\Teacher\TeacherRepositoryInterface;
use App\Repository\Graduated\GraduatedRepositoryInterface;
use App\Repository\Promotion\PromotionRepositoryInterface;

use App\Repository\Processings\ProcessingRepositoryInterface;
use App\Repository\Receipt_Student\Receipt_StudentRepository;
use App\Repository\Fee_Invoice\Fee_InvoiceRepositoryInterface;
use App\Repository\Receipt_Student\Receipt_StudentRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TeacherRepositoryInterface::class, TeacherRepository::class);
        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);
        $this->app->bind(PromotionRepositoryInterface::class, PromotionRepository::class);
        $this->app->bind(GraduatedRepositoryInterface::class, GraduatedRepository::class);
        $this->app->bind(FeeRepositoryInterface::class, FeeRepository::class);
        $this->app->bind(Fee_InvoiceRepositoryInterface::class, Fee_InvoiceRepository::class);
        $this->app->bind(Receipt_StudentRepositoryInterface::class, Receipt_StudentRepository::class);
        $this->app->bind(ProcessingRepositoryInterface::class, ProcessingRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);

    



        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
