<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\Ad2Controller;
use App\Http\Controllers\Admin\Ad3Controller;
use App\Http\Controllers\Admin\BookDriveController;
use App\Http\Controllers\Admin\BookDriveFileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DriveController;
use App\Http\Controllers\Admin\DriveFileController;
use App\Http\Controllers\Admin\ExamAnserController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\MemberController;
use App\Models\BookDrive;
use App\Models\ExamAnser;

Route::middleware('adminAuth')->prefix('admin')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // الاعدادات العامة
    Route::prefix('generalSetting')->controller(GeneralSettingController::class)->group(function(){
        Route::get('/', 'create')->name('generalSetting.create');
        Route::post('/', 'store')->name('generalSetting.store');
    });
    // اضافة مستخدم
    Route::prefix('users')->controller(UserController::class)->group(function(){
        Route::get('/', 'create')->name('users.create');
        Route::post('/', 'store')->name('users.store');
        Route::get('/{id}', 'edit')->name('users.edit');
        Route::post('/{id}', 'update')->name('users.update');
        Route::get('/destroy/{id}', 'destroy')->name('users.destroy');
    });
    // المستخدمين
    Route::prefix('member')->controller(MemberController::class)->group(function(){
        Route::get('/', 'create')->name('member.create');
        Route::get('/{id}', 'edit')->name('member.edit');
        Route::post('/{id}', 'update')->name('member.update');
        Route::get('/destroy/{id}', 'destroy')->name('member.destroy');
        Route::get('/active/member','active_members')->name('member.activeMembers');
        Route::get('/nonActive/member','nonActive_members')->name('nonActive_members');
    });

    // اضافة تصنيف
    Route::prefix('category')->controller(CategoryController::class)->group(function(){
        Route::get('/', 'create')->name('category.create');
        Route::post('/', 'store')->name('category.store');
        Route::get('/{id}', 'edit')->name('category.edit');
        Route::post('/{id}', 'update')->name('category.update');
        Route::get('/destroy/{id}', 'destroy')->name('category.destroy');
    });
    // اضافة تصنيف فرعى
    Route::prefix('subCategory')->controller(SubCategoryController::class)->group(function(){
        Route::get('/', 'create')->name('subCategory.create');
        Route::post('/', 'store')->name('subCategory.store');
        Route::get('/{id}', 'edit')->name('subCategory.edit');
        Route::post('/{id}', 'update')->name('subCategory.update');
        Route::get('/destroy/{id}', 'destroy')->name('subCategory.destroy');
    });
    // اضافة دروس
    Route::prefix('subject')->controller(SubjectController::class)->group(function(){
        Route::get('/', 'create')->name('subject.create');
        Route::post('/', 'store')->name('subject.store');
        Route::get('/{id}', 'edit')->name('subject.edit');
        Route::post('/{id}', 'update')->name('subject.update');
        Route::get('/destroy/{id}', 'destroy')->name('subject.destroy');
        Route::get('/category/ajax/{id}', 'categoryAjax')->name('category.ajax');
    });
    // اضافة الاعلان الاول
    Route::prefix('ads')->controller(AdController::class)->group(function(){
        Route::get('/', 'create')->name('ads.create');
        Route::post('/', 'store')->name('ads.store');
        Route::get('/destroy/{id}', 'destroy')->name('ads.destroy');
    });
    // اضافة الاعلان الثانى
    Route::prefix('ad2s')->controller(Ad2Controller::class)->group(function(){
        Route::get('/', 'create')->name('ad2s.create');
        Route::post('/', 'store')->name('ad2s.store');
        Route::get('/destroy/{id}', 'destroy')->name('ad2s.destroy');
    });
    // اضافة الاعلان الثالث
    Route::prefix('ad3s')->controller(Ad3Controller::class)->group(function(){
        Route::get('/', 'create')->name('ad3s.create');
        Route::post('/', 'store')->name('ad3s.store');
        Route::get('/destroy/{id}', 'destroy')->name('ad3s.destroy');
    });
    // اضافة مجلدات 
    Route::prefix('drives')->controller(DriveController::class)->group(function(){
        Route::get('/', 'create')->name('drives.create');
        Route::post('/', 'store')->name('drives.store');
        Route::get('/{id}', 'edit')->name('drives.edit');
        Route::post('/{id}', 'update')->name('drives.update');
        Route::get('/destroy/{id}', 'destroy')->name('drives.destroy');
    });
    // اضافة ملف لمجلد 
    Route::prefix('driveFiles')->controller(DriveFileController::class)->group(function(){
        Route::get('/', 'create')->name('driveFile.create');
        Route::post('/', 'store')->name('driveFile.store');
        Route::get('/{id}', 'edit')->name('driveFile.edit');
        Route::post('/{id}', 'update')->name('driveFile.update');
        Route::get('/destroy/{id}', 'destroy')->name('driveFile.destroy');
    });
    // اضافة مجلدات كتب جامعية 
    Route::prefix('bookDrive')->controller(BookDriveController::class)->group(function(){
        Route::get('/', 'create')->name('bookDrive.create');
        Route::post('/', 'store')->name('bookDrive.store');
        Route::get('/{id}', 'edit')->name('bookDrive.edit');
        Route::post('/{id}', 'update')->name('bookDrive.update');
        Route::get('/destroy/{id}', 'destroy')->name('bookDrive.destroy');
    });
    // اضافة كتاب جامعى 
    Route::prefix('bookDriveFile')->controller(BookDriveFileController::class)->group(function(){
        Route::get('/', 'create')->name('bookDriveFile.create');
        Route::post('/', 'store')->name('bookDriveFile.store');
        Route::get('/{id}', 'edit')->name('bookDriveFile.edit');
        Route::post('/{id}', 'update')->name('bookDriveFile.update');
        Route::get('/destroy/{id}', 'destroy')->name('bookDriveFile.destroy');
    });
    // اضافة امتحان لدرس  
    Route::prefix('exam')->controller(ExamController::class)->group(function(){
        Route::get('/', 'create')->name('exam.create');
        Route::post('/', 'store')->name('exam.store');
        Route::get('/{id}', 'edit')->name('exam.edit');
        Route::post('/{id}', 'update')->name('exam.update');
        Route::get('/destroy/{id}', 'destroy')->name('exam.destroy');
        Route::get('/subCategory/ajax/{id}', 'sub_categoryAjax')->name('subCategory.ajax');
    });
    // اضافة امتحان لدرس  
    Route::prefix('examAnser')->controller(ExamAnserController::class)->group(function(){
        Route::get('/', 'create')->name('examAnser.create');
        Route::post('/', 'store')->name('examAnser.store');
        Route::get('/{id}', 'edit')->name('examAnser.edit');
        Route::post('/{id}', 'update')->name('examAnser.update');
        Route::get('/destroy/{id}', 'destroy')->name('examAnser.destroy');
    });
});