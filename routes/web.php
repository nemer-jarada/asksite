<?php

use App\Http\Controllers\admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

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

Route::prefix('admin')->name('admin.')->group(function() {
    // Route::get('/', AdminController::class, 'index')->name('index');
});

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/question/{id?}', [SiteController::class, 'single'])->name('single');
Route::get('/articals/{id?}', [SiteController::class, 'articals'])->name('articals');
Route::get('/oneartical/{id?}', [SiteController::class, 'oneartical'])->name('oneartical');
Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
Route::get('/category/{name}', [SiteController::class, 'category'])->name('category');

