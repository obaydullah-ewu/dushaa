<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FeaturedPhotoController;
use App\Http\Controllers\Admin\FeaturedVideoController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('profile', function(){
    return view('frontend.user.profile');
});
Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'auth'], function (){
    Route::get('my-profile', [UserController::class, 'myProfile'])->name('my-profile');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function (){
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['admin']], function (){
        Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        //Start:: Admin
        Route::resource('admin', AdminController::class);
        Route::get('admin-list-pdf', [AdminController::class, 'adminListPDF'])->name('admin.list.pdf');

        Route::get('change-password/{id}', [AdminController::class, 'changePassword'])->name('change-password');
        Route::post('change-password/{id}', [AdminController::class, 'changePasswordUpdate'])->name('change-password.update');

        Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
            Route::get('home-setting', [SettingController::class, 'homeSetting'])->name('home-setting');
            Route::post('general-settings-update', [SettingController::class, 'generalSettingUpdate'])->name('general-settings.update');
            Route::resource('featured-photo', FeaturedPhotoController::class);
            Route::resource('featured-video', FeaturedVideoController::class);
        });
    });
});

Route::get('migrate', function (){
   Artisan::call('migrate');
});
