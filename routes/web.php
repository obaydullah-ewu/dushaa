<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\FeaturedPhotoController;
use App\Http\Controllers\Admin\FeaturedVideoController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MemberCategoryController;
use App\Http\Controllers\Admin\MemberRequestController;
use App\Http\Controllers\Admin\ProfessionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\EventRegistrationController;
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
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.post');
Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'auth'], function (){
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::get('my-profile', [UserController::class, 'myProfile'])->name('my-profile');
    Route::post('my-profile', [UserController::class, 'profileUpdate'])->name('profile-update');
    Route::get('transaction-history', [UserController::class, 'transactionHistory'])->name('transaction-history');
    Route::get('transaction-history/details/{id}', [UserController::class, 'transactionHistoryDetails'])->name('transaction-history.details');
    Route::get('request-member', [UserController::class, 'requestMember'])->name('request-member');
    Route::post('request-member', [UserController::class, 'requestMemberStore'])->name('request-member.store');
    Route::get('get-category-member-fee', [UserController::class, 'categoryMemberFee'])->name('get-category-member-fee');
    Route::get('event-registration/{id}', [EventRegistrationController::class, 'eventRegistration'])->name('eventRegistration');
    Route::post('event-registration/{id}', [EventRegistrationController::class, 'eventRegistrationStore'])->name('eventRegistration.store');
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
            Route::get('payment-setting', [SettingController::class, 'paymentSetting'])->name('payment-setting');
            Route::post('general-settings-update', [SettingController::class, 'generalSettingUpdate'])->name('general-settings.update');
            Route::resource('featured-photo', FeaturedPhotoController::class);
            Route::resource('featured-video', FeaturedVideoController::class);
            Route::resource('department', DepartmentController::class);
            Route::resource('designation', DesignationController::class);
            Route::resource('member-category', MemberCategoryController::class);
            Route::resource('profession', ProfessionController::class);
        });

        Route::resource('event', EventController::class);

        Route::group(['prefix' => 'request-member', 'as' => 'request-member.'], function (){
            Route::get('request-member', [MemberRequestController::class, 'memberRequestList'])->name('list');
            Route::get('request-event', [MemberRequestController::class, 'eventRequestList'])->name('request-event.list');
            Route::get('approved-list', [MemberRequestController::class, 'approvedMemberRequestList'])->name('approved.list');
            Route::get('member-details/{user_id}', [MemberRequestController::class, 'memberDetails'])->name('member-details');
            Route::post('changeStatus', [MemberRequestController::class, 'changeStatus'])->name('changeStatus');
        });
    });
});

Route::get('migrate', function (){
   Artisan::call('migrate');
});
