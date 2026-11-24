<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class LoginController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = $request->validated();
        $credentials['is_aktif'] = true;

        if (! Auth::attempt($credentials)){
            return back()
                ->withErrors(['email' => 'Email atau kata sandi salah, atau akun tidak aktif.'])
                ->onlyInput('email');
        }
        $request->session()->regenerate();

        return match (Auth::user()->role) {
            User::ROLE_ADMIN    => redirect()->intended(route('admin.dashboard')),
            User::ROLE_PSIKOLOG => redirect()->intended(route('psikolog.dashboard')),
            default    => redirect()->intended(route('klien.dashboard')),
        };
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
