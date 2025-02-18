<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['locale'])->group(function () {

    Route::get('/', [PageController::class, 'welcome'])->name('welcome');

    Route::middleware(['auth'])->group(function () {

        Route::middleware('verified')->group(function () {

            Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

        });

        Route::get('/user', [\App\Http\Controllers\UserController::class, 'index'])->name('user.index');
        Route::get('/user/create', [\App\Http\Controllers\UserController::class, 'create'])->name('user.create');
        Route::post('/user', [\App\Http\Controllers\UserController::class, 'store'])->name('user.store');
        Route::get('/user/{user}', [\App\Http\Controllers\UserController::class, 'show'])->name('user.show');
        Route::get('/user/{user}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
        Route::patch('/user/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('user.update');
        Route::delete('/user/{user}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('user.destroy');

        Route::get('/role', [\App\Http\Controllers\RoleController::class, 'index'])->name('role.index');
        Route::get('/role/create', [\App\Http\Controllers\RoleController::class, 'create'])->name('role.create');
        Route::post('/role', [\App\Http\Controllers\RoleController::class, 'store'])->name('role.store');
        Route::get('/role/{role}', [\App\Http\Controllers\RoleController::class, 'show'])->name('role.show');
        Route::get('/role/{role}/edit', [\App\Http\Controllers\RoleController::class, 'edit'])->name('role.edit');
        Route::patch('/role/{role}', [\App\Http\Controllers\RoleController::class, 'update'])->name('role.update');
        Route::delete('/role/{role}', [\App\Http\Controllers\RoleController::class, 'destroy'])->name('role.destroy');

        Route::as('account.')->group(function () {
            Route::get('/account/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/account/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/account/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
            Route::get('/account/change-password', [PasswordController::class, 'edit'])->name('password.edit');
            Route::get('/account/change-language', [PageController::class, 'locale'])->name('locale');
        });
    });

    require __DIR__.'/auth.php';
});
