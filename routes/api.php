<?php

use App\Actions\Auth\Login;
use App\Actions\Auth\Me;
use App\Actions\Auth\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', Register::class)->name('auth.register');
    Route::post('/login', Login::class)->name('auth.login');
    Route::get('/me', Me::class)->name('auth.me')->middleware('auth');
});
