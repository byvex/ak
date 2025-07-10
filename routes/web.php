<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolePermissionController;

/*
|--------------------------------------------------------------------------
| Public Home Route
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| Admin Guest Routes (Only for guests)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
});

/*
|--------------------------------------------------------------------------
| Admin Authenticated Routes (admin/ prefix + role:admin middleware)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    // Admin Dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Roles Management
    Route::resource('roles', RoleController::class)->except(['show']);

    // Permissions Management
    Route::resource('permissions', PermissionController::class)->except(['show']);
    // User Management
Route::resource('users', UserController::class)->except(['show']);

    // Assign Permissions to Roles
    Route::prefix('roles/{role}')->group(function () {
        Route::get('permissions', [RolePermissionController::class, 'index'])->name('role-permissions.index');
        Route::post('permissions', [RolePermissionController::class, 'store'])->name('role-permissions.store');
    });
});

/*
|--------------------------------------------------------------------------
| Logout Route (Shared between users/admins)
|--------------------------------------------------------------------------
*/
Route::middleware('web')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Authenticated User Settings (Livewire Volt)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

/*
|--------------------------------------------------------------------------
| User Dashboard Route
|--------------------------------------------------------------------------
*/


require __DIR__.'/auth.php';
