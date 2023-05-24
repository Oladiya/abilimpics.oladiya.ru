<?php

use App\Http\Controllers\API\ApiTokenController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);//->name('home');

Route::name('user.')->group( function (){
    Route::get('/reg', [RegistrationController::class, 'index'])->name('reg');
    Route::post('/reg', [RegistrationController::class, 'store'])->name('reg.post');
    Route::get('/logout', function () {
        Auth::logout();
        return redirect(route('home'));
    })->name('logout');
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.post');
    Route::get('/ls', [UserController::class, 'index'])->name('ls');
    Route::get('/admin', [UserController::class, 'admin'])->name('admin');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/token', [ApiTokenController::class, 'update']);

Route::apiResource('orders', OrderController::class);
