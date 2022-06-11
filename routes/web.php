<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });



Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');





Route::group(['middleware' => 'auth'], function () {

    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);



   // creamos un grupo de rutas protegidas para los controladores

    Route::resource('roles', RolController::class);
    Route::resource('user', UserController::class, ['except' => ['show']]);


});



