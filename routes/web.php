<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;


Route::middleware('guest')->group(function () {
    Route::get('/login', [HomeController::class, 'index'])->name('login');
    Route::post('/login', [HomeController::class, 'login'])->name('login.attempt');

    //Route::redirect('/', '/login');
});
// Route::get('/users', [UserController::class, 'index'])->name('users.index');
// Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
// Route::post('/users', [UserController::class, 'store'])->name('users.store');
// Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
// Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
// Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
// Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::middleware('auth')->group(function () {
    Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
    Route::resource('users', UserController::class);
    Route::resource('projects', ProjectController::class);

    Route::redirect('/', '/projects');
});