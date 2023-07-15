<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeCrudsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CsvController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PdfController;
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

Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.perform');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('employeecruds', EmployeeCrudsController::class);
    Route::get('/', [EmployeeCrudsController::class, 'index']);
    Route::get('/export-pdf', [PdfController::class, 'exportPdf'])->name('export.pdf');
    Route::get('/export-csv', [CsvController::class, 'exportCsv'])->name('export.csv');
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
});