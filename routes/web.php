<?php



use App\Models\Classroom;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Fee\FeeController;
use App\Http\Controllers\Grade\GradeController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Sections\SectionController;
use App\Http\Controllers\Myparent\MyparentController;
use App\Http\Controllers\Student\GraduatedController;
use App\Http\Controllers\Classroom\ClassroomController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Promotion\PromotionController;
use App\Http\Controllers\Fee_Invoice\FeeInvoiceController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Processings\ProcessingController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Receipt_Student\ReceiptStudentController;



Auth::routes();
// ######################### route login #########################
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'guest']
    ],
    function () {

        Route::get('/', function () {
            return view('auth.login');
        });
    }
);

// ######################### end route login #########################


// ######################### route dashboard #########################
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {

        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::resource('Grade', GradeController::class);
        Route::resource('Classroom', ClassroomController::class);
        Route::POST('/deleteall', [ClassroomController::class, 'deleteall'])->name('deleteall');
        Route::resource('Sections', SectionController::class);
        Route::get('classes/{id}', [SectionController::class, 'classes']);
        Route::resource('Teacher', TeacherController::class);
        Route::resource('Student', StudentController::class);
        Route::get('/get-classrooms/{gradeId}', [StudentController::class, 'getClassrooms']);
        Route::get('/sections/{classroomId}', [StudentController::class, 'getSectionsByClassroom'])->name('sections.by.classroom');

        Route::post('Upload_attachment', [StudentController::class, 'Upload_attachment'])->name('Upload_attachment');
        Route::get('Download_attachment/{name}/{filename}', [StudentController::class, 'Download_attachment'])->name('Download_attachment');
        Route::delete('deleteImage', [StudentController::class, 'deleteImage'])->name('deleteImage');
        Route::resource('Promotion', PromotionController::class);
        Route::resource('Graduated',GraduatedController::class);
        Route::resource('Fee',FeeController::class);
        Route::resource('Fee_Invoice',FeeInvoiceController::class);
        Route::resource('Receipt_Student',ReceiptStudentController::class);
        Route::resource('Processing', ProcessingController::class);
        Route::resource('Payment',PaymentController::class);

    }

);
// ######################### end route dashboard #########################

Route::resource('show_form_wizard', MyparentController::class);
