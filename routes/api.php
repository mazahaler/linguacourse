<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::group( [
    'middleware' => 'api',
    'prefix'     => 'auth'

], function () {
    Route::post( '/login', [ AuthController::class, 'login' ] );
    Route::post( '/register', [ AuthController::class, 'register' ] );
    Route::post( '/logout', [ AuthController::class, 'logout' ] );
    Route::post( '/refresh', [ AuthController::class, 'refresh' ] );
    Route::post( '/password/forgot-password', [
        AuthController::class,
        'sendResetLinkResponse'
    ] )->name( 'passwords.sent' );
    Route::post( '/password/reset', [ AuthController::class, 'sendResetResponse' ] )->name( 'passwords.reset' );
} );

Route::group( [
    'middleware' => 'api',
    'prefix'     => 'user'
], function () {
    Route::get( '/profile', [ UserController::class, 'userProfile' ] );
} );

Route::group( [
    'middleware' => 'api',
    'prefix'     => 'course'
], function () {
    Route::get( '/all', [ CourseController::class, 'all' ] );
    Route::post( '/create', [ CourseController::class, 'create' ] );
    Route::get( '/get', [ CourseController::class, 'get' ] );
} );
