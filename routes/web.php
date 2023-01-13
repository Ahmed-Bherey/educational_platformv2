<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Web\UserLoginController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\web\TechnicalSupportController;
use App\Http\Controllers\web\UserProfilrController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// login & logout Admin
Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'loginForm')->name('login.form');
    Route::post('login', 'login')->name('login');
    Route::get('logout', 'logout')->name('logout');
});
// login & logout User
Route::controller(UserLoginController::class)->prefix('user')->group(function () {
    Route::get('login', 'loginForm')->name('user.login.form');
    Route::post('login', 'login')->name('user.login');
    Route::get('logout', 'logout')->name('user.logout');
    Route::get('register', 'registerForm')->name('register.form');
    Route::post('register', 'register')->name('user.register');
});
// الملف الشخصى للسمتخدم
Route::middleware('userAuth')->prefix('profile')->controller(UserProfilrController::class)->group(function () {
    Route::get('/{id}', 'userProfileForm')->name('user.profile.form');
    Route::post('/{id}', 'userProfileUpdate')->name('user.profile.update');
});
// home
Route::get('/', [HomeController::class, 'index'])->name('web.index');
// منصة الأولياء والتلاميذ
Route::prefix('edu-platform')->controller(HomeController::class)->group(function () {
    Route::get('/', 'eduPlatform')->name('web.eduPlatform');
    Route::middleware(['userAuth', 'activeMember'])->group(function () {
        Route::get('/subjects/{id}', 'subjects')->name('web.subjects');
        Route::get('/subjectsAll', 'subjectsAll')->name('web.subjectsAll');
        Route::get('/subject_details/{id}', 'subject_details')->name('web.subject.details');
        Route::get('/subject_content/{id}', 'subject_content')->name('web.subject.content');
        Route::get('/sub_cat_subjects/{id}', 'sub_cat_subjects')->name('sub_cat_subjects');
        Route::get('/download/{id}', 'download')->name('download');
        Route::get('/exam/{id}', 'exam')->name('web.subject.exam');
    });
});

// منصة الأساتذة
Route::prefix('teacher-platform')->controller(HomeController::class)->group(function () {
    Route::get('/drives', 'drives')->name('web.drives');
    Route::middleware(['userAuth', 'activeMember'])->group(function () {
        Route::get('/driveFiles/{id}', 'driveFiles')->name('web.driveFiles');
        Route::get('/driveFiles_content/{id}', 'driveFiles_content')->name('web.driveFiles.content');
    });
});

// منصة الكتب الجامعية
Route::prefix('books-platform')->controller(HomeController::class)->group(function () {
    Route::get('/bookDrive', 'bookDrive')->name('web.bookDrive');
        Route::get('/bookDriveFile/{id}', 'bookDriveFile')->name('web.bookDriveFile');
        Route::get('/bookDriveFile_content/{id}', 'bookDriveFile_content')->name('web.bookDriveFile.content');
        Route::get('/bookDownload/{id}', 'bookDownload')->name('bookDownload');
});
// الدعم الفنى
Route::get('technicalSuppor', [TechnicalSupportController::class, 'technicalSupportShow'])->name('technical.support.show');
// Roles
Route::resource('roles', RoleController::class);
