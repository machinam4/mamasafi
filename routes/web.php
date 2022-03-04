<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
    return view('home');
});
Route::get('/admin', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/admin/add_service', [AdminController::class, 'add_service'])->name('add_service');
Route::get('/admin/list_services', [AdminController::class, 'list_services'])->name('list_services');

// post data routes
Route::post('/admin/add_service_all', [AdminController::class, 'add_service_all'])->name('add_service_all');
Route::post('/admin/add_service', [AdminController::class, 'add_service'])->name('add_service');
Route::post('/admin/add_subservice', [AdminController::class, 'add_subservice'])->name('add_subservice');
Route::post('/admin/add_variation', [AdminController::class, 'add_variation'])->name('add_variation');
Route::post('/admin/add_variation_option', [AdminController::class, 'add_variation_option'])->name('add_variation_option');
