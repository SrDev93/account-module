<?php

use Modules\Account\Http\Controllers\RegisterController;
use \Modules\Account\Http\Controllers\LoginController;
use Modules\Account\Http\Controllers\UserController;

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

//Route::prefix('')->name('auth.')->middleware('guest')->group(function () {
//    Route::get('register', [RegisterController::class, 'register_show'])->name('register.show');
//    Route::post('register', [RegisterController::class, 'register'])->name('register.store');
//    Route::get('login', [LoginController::class, 'login_show'])->name('login.show');
//    Route::post('login', [LoginController::class, 'login'])->name('login');
//});

Route::prefix('panel')->name('admin.')->group(function () {
    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::post('profile-update', [UserController::class, 'update'])->name('profile.update');

    Route::resource('role-permission', RolePermissionController::class)->except(['show']);
    Route::resource('manage-user', ManageUserController::class)->except(['show']);
});
