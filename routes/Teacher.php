<?php

use App\Models\Classroom;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Fee\FeeController;
use App\Http\Controllers\Exam\ExamController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Grade\GradeController;
use App\Http\Controllers\Quizze\QuizzeController;
use App\Http\Controllers\Library\LibraryController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Settings\SettingController;
use App\Http\Controllers\Myparent\MyparentController;
use App\Http\Controllers\Question\QuestionController;
use App\Http\Controllers\Student\GraduatedController;
use App\Http\Controllers\Subjects\SubjectsController;
use App\Http\Controllers\Classroom\ClassroomController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Promotion\PromotionController;
use App\Http\Controllers\Attendance\AttendanceController;
use App\Http\Controllers\Fee_Invoice\FeeInvoiceController;
use App\Http\Controllers\Processings\ProcessingController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Online_Classe\OnlineClasseController;
use App\Http\Controllers\Receipt_Student\ReceiptStudentController;


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::get('/teacher/dashboard', [HomeController::class,'dashboardteacher'])->name('dashboard.teacher');
   
    }

);
