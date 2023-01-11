<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/', [\App\Http\Controllers\HomeController::class , 'index'])->name('home');
Auth::routes();

Route::get('/film' , [\App\Http\Controllers\HomeController::class , 'film_pagination'])->name('film_pagination');
Route::get('/film/{original_title}' , [\App\Http\Controllers\HomeController::class , 'single_film'])->name('single_film');


Route::get('/serial' , [\App\Http\Controllers\HomeController::class , 'serial_pagination'])->name('serial_pagination');
Route::get('/serial/{original_title}' , [\App\Http\Controllers\HomeController::class , 'single_serial'])->name('single_serial');
Route::post('/serials/{title}' , [\App\Http\Controllers\HomeController::class , 'categories_serial'])->name('category-child-serial');
Route::post('/film/{title}' , [\App\Http\Controllers\HomeController::class , 'categories_video'])->name('category-child-video');



Route::post('film/{original_title}/comment',[\App\Http\Controllers\HomeController::class , 'comment'])->name('film-comment');

Route::post('/interests/video' , [\App\Http\Controllers\InterestController::class , 'index_video'])->name('interest-video');
Route::post('/interests/serial' , [\App\Http\Controllers\InterestController::class , 'index_serial'])->name('interest-serial');


Route::get('category/{slug?}/category',[\App\Http\Controllers\HomeController::class , 'singleCategory'])->name('category-single');

Route::get('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');


