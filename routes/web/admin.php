<?php

use Illuminate\Support\Facades\Route;


Route::get('/',function (){
    return view('Admin.index');
});

Route::get('updates' , [\App\Http\Controllers\Admin\Update\UpdateController::class , 'index'])->name('updates.index');
Route::get('updates/film' , [\App\Http\Controllers\Admin\Update\UpdateController::class , 'update_film'])->name('updates.film');
Route::get('updates/serial' , [\App\Http\Controllers\Admin\Update\UpdateController::class , 'update_serial'])->name('updates.serial');

Route::get('/PVideo' , [\App\Http\Controllers\Admin\Update\JobController::class , 'pagination_video'])->name('pagination_video');
Route::get('/PSerial' , [\App\Http\Controllers\Admin\Update\JobController::class , 'pagination_serial'])->name('pagination_serial');

Route::get('/LVideo' , [\App\Http\Controllers\Admin\Update\JobController::class , 'link_video'])->name('link_video');
Route::get('/LSerial' , [\App\Http\Controllers\Admin\Update\JobController::class , 'link_serial'])->name('link_serial');

Route::get('/DVideo' , [\App\Http\Controllers\Admin\Update\JobController::class , 'detail_video'])->name('detail_video');
Route::get('/DSerial' , [\App\Http\Controllers\Admin\Update\JobController::class , 'detail_serial'])->name('detail_serial');

Route::get('/DLVideo' , [\App\Http\Controllers\Admin\Update\JobController::class , 'download_link_video'])->name('download_video');
Route::get('DLSerial', [\App\Http\Controllers\Admin\Update\JobController::class , 'download_link_serial'])->name('download_serial');

Route::resource('films' , \App\Http\Controllers\Admin\film\FilmController::class);
Route::post('film/genre' , [\App\Http\Controllers\Admin\film\Details\AddDetailsFilmController::class , 'genre_index'])->name('film-genre-index');
Route::post('film/genre/{id}/store' , [\App\Http\Controllers\Admin\film\Details\AddDetailsFilmController::class , 'genre_store'])->name('film-genre-store');
Route::post('film/actor' , [\App\Http\Controllers\Admin\film\Details\AddDetailsFilmController::class , 'actor_index'])->name('film-actor-index');
Route::post('film/actor/{id}/store' , [\App\Http\Controllers\Admin\film\Details\AddDetailsFilmController::class , 'actor_store'])->name('film-actor-store');


Route::resource('serials' , \App\Http\Controllers\Admin\serial\SerialController::class);
Route::post('serial/genre' , [\App\Http\Controllers\Admin\serial\Details\AddDetailsSerialController::class , 'genre_index'])->name('serial-genre-index');
Route::post('serial/genre/{id}/store' , [\App\Http\Controllers\Admin\serial\Details\AddDetailsSerialController::class , 'genre_store'])->name('serial-genre-store');
Route::post('serial/actor' , [\App\Http\Controllers\Admin\serial\Details\AddDetailsSerialController::class , 'actor_index'])->name('serial-actor-index');
Route::post('serial/actor/{id}/store' , [\App\Http\Controllers\Admin\serial\Details\AddDetailsSerialController::class , 'actor_store'])->name('serial-actor-store');

//Route::get('/plans')->name('plan');



Route::get('/comments/unapproved' , [\App\Http\Controllers\Admin\CommentController::class , 'unapproved'])->name('comments.unapproved');
Route::resource('comments' , \App\Http\Controllers\Admin\CommentController::class)->only(['index','destroy','update']);


Route::resource('users' , \App\Http\Controllers\Admin\User\UserController::class);
Route::resource('permissions' , \App\Http\Controllers\Admin\PermissionController::class);
Route::resource('roles' , \App\Http\Controllers\Admin\RoleController::class);
Route::get('user/{user}/permission' , [\App\Http\Controllers\Admin\User\Permissioncontroller::class , 'index'])->name('user.permission');
Route::post('user/{user}/permission' , [\App\Http\Controllers\Admin\User\Permissioncontroller::class , 'insert'])->name('user.permission.insert');


Route::resource('categories' , \App\Http\Controllers\Admin\CategoryController::class);

Route::resource('plans' , \App\Http\Controllers\Admin\PlanController::class);
Route::resource('films.similar' , \App\Http\Controllers\Admin\film\SimilarControoler::class);
Route::resource('serials.similar' , \App\Http\Controllers\Admin\serial\SimilarControoler::class);
