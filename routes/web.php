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
