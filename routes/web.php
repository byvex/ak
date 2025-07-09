<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminDashboardController;

// routes/web.php
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolePermissionController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

// Admin Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    // Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('roles', RoleController::class)->except(['show']);
    Route::resource('permissions', PermissionController::class)->except(['show', 'create', 'store']);
    
    Route::prefix('roles/{role}')->group(function () {
        Route::get('permissions', [RolePermissionController::class, 'index'])
            ->name('role-permissions.index');
        Route::post('permissions', [RolePermissionController::class, 'store'])
            ->name('role-permissions.store');
    });
    
    // Home route with permission check
    Route::get('/home', function () {
        return view('home');
    })->middleware('can:view dashboard')->name('home');
});

require __DIR__.'/auth.php';
