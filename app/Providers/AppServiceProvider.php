<?php

namespace App\Providers;

use App\Models\Payment;
use App\Models\Subjects;
use App\Repository\Fee\FeeRepository;
use App\Repository\Exam\ExamRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\Quizze\QuizzeRepository;
use App\Repository\Library\LibraryRepository;
use App\Repository\Payment\PaymentRepository;
use App\Repository\Student\StudentRepository;
use App\Repository\Teacher\TeacherRepository;
use App\Repository\Fee\FeeRepositoryInterface;
use App\Repository\Question\QuestionRepository;
use App\Repository\Settings\SettingsRepository;
use App\Repository\Subjects\SubjectsRepository;
use App\Repository\Exam\ExamRepositoryInterface;
use App\Repository\Graduated\GraduatedRepository;
use App\Repository\Promotion\PromotionRepository;
use App\Repository\Attendance\AttendanceRepository;

use App\Repository\Processings\ProcessingRepository;
use App\Repository\Quizze\QuizzeRepositoryInterface;
use App\Repository\Fee_Invoice\Fee_InvoiceRepository;
use App\Repository\Library\LibraryRepositoryInterface;
use App\Repository\Payment\PaymentRepositoryInterface;
use App\Repository\Student\StudentRepositoryInterface;
use App\Repository\Teacher\TeacherRepositoryInterface;
use App\Repository\Question\QuestionRepositoryInterface;
use App\Repository\Settings\SettingsRepositoryInterface;
use App\Repository\Subjects\SubjectsRepositoryInterface;
use App\Repository\Online_Classe\Online_ClasseRepository;
use App\Repository\Graduated\GraduatedRepositoryInterface;
use App\Repository\Promotion\PromotionRepositoryInterface;
use App\Repository\Attendance\AttendanceRepositoryInterface;
use App\Repository\Processings\ProcessingRepositoryInterface;
use App\Repository\Receipt_Student\Receipt_StudentRepository;
use App\Repository\Fee_Invoice\Fee_InvoiceRepositoryInterface;
use App\Repository\Online_Classe\Online_ClasseRepositoryInterface;
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
        $this->app->bind(AttendanceRepositoryInterface::class, AttendanceRepository::class);
        $this->app->bind(SubjectsRepositoryInterface::class, SubjectsRepository::class);
        $this->app->bind(ExamRepositoryInterface::class, ExamRepository::class);
        $this->app->bind(QuizzeRepositoryInterface::class, QuizzeRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
        $this->app->bind(Online_ClasseRepositoryInterface::class, Online_ClasseRepository::class);
        $this->app->bind(LibraryRepositoryInterface::class, LibraryRepository::class);
        $this->app->bind(SettingsRepositoryInterface::class, SettingsRepository::class);





    



        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
