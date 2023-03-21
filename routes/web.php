<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

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

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/profile/register', [RegisterController::class, 'show'])->name('registerShow');
Route::post('/profile/register', [RegisterController::class, 'store'])->name('register');
Route::get('/profile', [ProfileController::class, 'index'])->name('profileList');
Route::post('/profile', [ProfileController::class, 'index'])->name('profileSearch');
Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile');
Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('update');
Route::delete('/profile/{id}', [ProfileController::class, 'delete'])->name('delete');
