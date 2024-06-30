<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\NewUserRegisterController;
use App\Http\Controllers\Calamidades\CalamidadesController;
use App\Http\Middleware\Authenticate;
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


Route::get('/register', [NewUserRegisterController::class, 'index']);
Route::post('/register', [NewUserRegisterController::class, 'create'])->name('register-user');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::middleware(Authenticate::class)->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');


    Route::get('/calamidades', [CalamidadesController::class ,'index'])->name('calamidades');
    Route::get('/calamidades/adcionar', [CalamidadesController::class ,'create'])->name('add-calamidades');
    Route::post('/calamidades/adcionar', [CalamidadesController::class ,'store'])->name('add-calamidades');
    Route::get('/calamidades/editar/{id}', [CalamidadesController::class, 'update'])->name('update-calamidades');
    Route::post('/calamidades/editar/{id}', [CalamidadesController::class, 'save'])->name('update-calamidades');
});