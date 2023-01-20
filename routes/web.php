<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return redirect('/login');
});


Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => 'teacher'], function () {
        Route::resource('/user', UserController::class);
        Route::resource('/room', RoomController::class);
        Route::resource('/notification', NotificationController::class);
    });

    Route::group(['middleware' => 'cr'], function () {
        Route::get('/message', [NotificationController::class, 'message'])->name('message.index');
        Route::resource('/record', RecordController::class);
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
