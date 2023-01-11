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


Route::get('/' , [\App\Http\Controllers\Profile\ProfileController::class,'index'])->name('profile.show');
Route::get('/profile/{user}/edit' , [\App\Http\Controllers\Profile\User\UserController::class , 'index'])->name('profile.edit.user');
Route::patch('/profile/{user}/update' , [\App\Http\Controllers\Profile\User\UserController::class , 'update'])->name('profile.update.user');
Route::resource('user' , \App\Http\Controllers\Profile\User\UserController::class);

Route::resource('/address' , \App\Http\Controllers\Profile\AddressController::class);
Route::get('/profile/vip/{month}' , [\App\Http\Controllers\Profile\VipUserController::class , 'vip'])->name('vip');
