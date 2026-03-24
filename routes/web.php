<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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

Route::get('/', function () {
    return redirect()->route('login');
});


Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    //settings
    Route::get('settings/edit', [SettingController::class,'edit'])->name('settings.edit');
    Route::put('settings/update-general', [SettingController::class,'updateGeneralSettings'])->name('settings.updateGeneral');
    Route::put('settings/update-email-social', [SettingController::class,'updateEmailSocialSettings'])->name('settings.updateEmailSocial');

    //Users
    Route::get('/user/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::post('/user/{id}/change-password', [UserController::class, 'changePassword'])->name('user.change-password');

});


