<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get("/logout", [AuthController::class, 'logout'])->name('logout');
Route::get('/', [AuthController::class, 'index'])->name('home');

Route::middleware([AdminMiddleware::class])->group(function () {

    Route::get('/managers', [AdminController::class, 'showManagers'])
        ->name('managers.list');

    Route::get('/managers/create', [AdminController::class, 'createManagerForm'])
        ->name('managers.create.form');

    Route::post('/managers/create', [AdminController::class, 'createManager'])
        ->name('managers.create');

    Route::get('/managers/{id}/edit', [AdminController::class, 'editManagerForm'])
        ->name('managers.edit.form');

    Route::post('/managers/{id}/edit', [AdminController::class, 'editManager'])
        ->name('managers.edit');

    Route::post('/managers/{id}/delete', [AdminController::class, 'deleteManager'])
        ->name('managers.delete');
});
