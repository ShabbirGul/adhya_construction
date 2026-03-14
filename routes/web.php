<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\VehicleController;
use App\Http\Controllers\Admin\BannerController;

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

Route::get('/', [UserController::class, 'home'])->name('home');
Route::get('/about-us', [UserController::class, 'about'])->name('user.about');
Route::get('/faqs', [UserController::class, 'faqs'])->name('user.faqs');
Route::get('/contact-us', [UserController::class, 'contact'])->name('user.contact');

// user
Route::get('/users', [UserController::class , 'index']);
Route::get('/categories', [UserController::class, 'categories'])->name('user.categories');
Route::get('/vehicles', [UserController::class, 'vehicles'])->name('user.vehicles');
Route::post('/contact-us', [\App\Http\Controllers\UserController::class, 'storeContact'])->name('user.contact.store');
Route::get('/users/create', [UserController::class , 'create']);
Route::post('/users', [UserController::class , 'store']);

// admin
Route::get('/admin/login', [AdminController::class , 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class , 'login']);
Route::get('/admin/dashboard', [AdminController::class , 'dashboard'])->name('admin.dashboard');
Route::post('/admin/logout', [AdminController::class , 'logout'])->name('admin.logout');

// category & vehicles
Route::resource('admin/categories', CategoryController::class)->names('categories');
Route::resource('admin/vehicles', VehicleController::class)->names('vehicles');
Route::resource('admin/banners', \App\Http\Controllers\Admin\BannerController::class)->names('banners');

// new dynamic sections
Route::resource('admin/clients', \App\Http\Controllers\Admin\ClientController::class)->names('clients');
Route::resource('admin/histories', \App\Http\Controllers\Admin\HistoryController::class)->names('histories');
Route::resource('admin/countries', \App\Http\Controllers\Admin\CountryController::class)->names('countries');
Route::resource('admin/testimonials', \App\Http\Controllers\Admin\TestimonialController::class)->names('testimonials');
Route::resource('admin/faqs', \App\Http\Controllers\Admin\FaqController::class)->names('faqs');
Route::resource('admin/contacts', \App\Http\Controllers\Admin\ContactQueryController::class)->names('contacts')->only(['index', 'destroy']);
