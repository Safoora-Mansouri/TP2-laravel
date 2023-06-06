<?php

use App\Http\Controllers\VilleController;
use App\Http\Controllers\EtudientController;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalizationController;


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
    return view('welcome');
});

Route::get('/ville',[VilleController::class,'index'])->name('ville.index');
Route::get('/ville-edit/{ville}', [VilleController::class, 'edit'])->name('ville.edit');
Route::delete('/ville-delete/{ville}', [VilleController::class, 'destroy'])->name('ville.destroy');
Route::get('/ville-create', [VilleController::class, 'create'])->name('ville.create');
Route::put('/ville-update/{ville}', [VilleController::class, 'update'])->name('ville.update');
Route::get('/ville-show/{ville}', [VilleController::class, 'show'])->name('ville.show');
Route::post('/ville-store', [VilleController::class, 'store'])->name('ville.store');


Route::get('/', [EtudientController::class, 'index'])->name('etudient.index');
Route::get('/etudient-edit/{etudient}', [EtudientController::class, 'edit'])->name('etudient.edit');
Route::delete('/etudient-delete/{etudient}', [EtudientController::class, 'destroy'])->name('etudient.destroy');
Route::get('/etudient-create', [EtudientController::class, 'create'])->name('etudient.create');
Route::put('/etudient-update/{etudient}', [EtudientController::class, 'update'])->name('etudient.update');
Route::get('/etudient-show/{etudient}', [EtudientController::class, 'show'])->name('etudient.show');
Route::post('/etudient-store', [EtudientController::class, 'store'])->name('etudient.store');


Route::get('/etudient/{etudient}', [EtudientController::class, 'showEtudient'])->name('showEtudiant');


//auth
Route::get('registration', [CustomAuthController::class, 'create'])->name('registration');
Route::post('registration', [CustomAuthController::class, 'store']);
//age as esme login estefadeh konin laravel mishnaseh, vagarne khodetoon bayad tarif konin.
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login', [CustomAuthController::class, 'authentication'])->name('login.authentication');

Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('user-list', [CustomAuthController::class, 'userList'])->name('user.list')->middleware('auth');
Route::get('lang/{locale}', [LocalizationController::class, 'index'])->name('lang');