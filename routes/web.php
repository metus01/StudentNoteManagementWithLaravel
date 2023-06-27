<?php

use App\Http\Controllers\Admin\FilController;
use App\Http\Controllers\Admin\FilMatLinkController;
use App\Http\Controllers\Admin\MatController;
use App\Http\Controllers\Admin\ProfController;
use App\Http\Controllers\Admin\YearController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function ()
{
    Route::resource('/fil',FilController::class);
    Route::resource('/mat',MatController::class);
    Route::resource('/year' ,YearController::class);
    Route::resource('/prof',ProfController::class)->except('create' , 'store');
    Route::resource('/link' , FilMatLinkController::class);
});
Route::get('/login',[AuthController::class , 'login'])->name('auth.login');
Route::post('/login' , [AuthController::class  ,  'doLogin'])->name('auth.doLogin');
Route::get('/register' , [AuthController::class ,  'register'])->name('auth.register');
Route::post('/register' , [AuthController::class ,  'doRegister'])->name('auth.doRegister');
Route::delete('/logout' , [AuthController::class , 'logout'])->name('logout')->middleware('auth');
Route::get('/home',[HomeController::class , 'index'])->name('home')->middleware('guest');
Route::get('/home/etudiant', [EtudiantController::class , 'index'])->name('etudiant.home');
Route::get('/home/prof',[ProfController::class , 'home'])->name('prof.home');
