<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Display admin login form
     */
    public function showLoginForm(): View
    {
        return view('admin.auth.login');
    }

    /**
     * Authenticate admin user
     */
    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'email' => 'Invalid credentials'
            ])->onlyInput('email');
        }

        $user = Auth::user();

        if (!$user->hasRole('admin')) {
            Auth::logout();
            return back()->withErrors([
                'email' => 'Admin access required'
            ])->onlyInput('email');
        }

        $request->session()->regenerate();
        return redirect()->intended(route('admin.dashboard'));
    }

    /**
     * Logout admin user
     */
    // // app/Http/Controllers/Admin/AuthController.php
public function logout(Request $request)
{
    try {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('admin.login');
    } catch (\Exception $e) {
        \Log::error('Logout failed: '.$e->getMessage());
        return redirect()->back()->withErrors(['logout' => 'Logout failed. Please try again.']);
    }
}
}