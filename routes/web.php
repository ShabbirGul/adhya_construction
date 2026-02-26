<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

// user
Route::get('/users', [UserController::class , 'index']);
Route::get('/users/create', [UserController::class , 'create']);
Route::post('/users', [UserController::class , 'store']);

// admin
Route::get('/admin/login', [AdminController::class , 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class , 'login']);
Route::get('/admin/dashboard', [AdminController::class , 'dashboard'])->name('admin.dashboard');
Route::post('/admin/logout', [AdminController::class , 'logout'])->name('admin.logout');