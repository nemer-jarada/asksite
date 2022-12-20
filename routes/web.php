<?php

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\QuotesController;
use App\Http\Controllers\admin\AnswersController;
use App\Http\Controllers\admin\ArticalsController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\QuestionsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::prefix(LaravelLocalization::setLocale())->group(function () {

    Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified', 'user_type'])->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');

        Route::resource('categories', CategoryController::class);
        Route::resource('questions', QuestionsController::class);
        Route::resource('quotes', QuotesController::class);
        Route::resource('articals', ArticalsController::class);
        Route::resource('answers', AnswersController::class);
    });

    Route::get('/', [SiteController::class, 'index'])->name('index');
    Route::get('/question/{id?}', [SiteController::class, 'single'])->name('single');
    Route::get('/articals/{id?}', [SiteController::class, 'articals'])->name('articals');
    Route::get('/oneartical/{id?}', [SiteController::class, 'oneartical'])->name('oneartical');
    Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
    Route::get('/category/{name}', [SiteController::class, 'category'])->name('category');
    Route::post('/answer', [SiteController::class, 'answer'])->name('answer');
    Route::post('/comment', [SiteController::class, 'comment'])->name('comment');
    Route::post('/form', [SiteController::class, 'form'])->name('form');


    Route::view('not-allowed', 'not-allowed')->name('not-allowed');
    Auth::routes(['verify' => true]);
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
