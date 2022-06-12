<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\LocationsController;
use App\Http\Controllers\EmployeeController;


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
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);


    Route::resource('departaments', DepartamentController::class);
    Route::resource('branches', BranchController::class);
    Route::resource('locations', LocationsController::class) 
    ->names('locations');
    Route::resource('employees', EmployeeController::class)
    ->names('employees');




});



