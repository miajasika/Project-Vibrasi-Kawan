<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email'     => ['required', 'email'],
            'password'  => ['required'],
        ], [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);

        $credentials['is_aktif'] = true;

        if (! Auth::attempt($credentials)){
            return back()
                ->withErrors(['email' => 'Email atau kata sandi salah, atau akun tidak aktif.'])
                ->onlyInput('email');
        }
        $request->session()->regenerate();

        return match (Auth::user()->role) {
            'admin'    => redirect()->intended(route('admin.dashboard')),
            'psikolog' => redirect()->intended(route('psikolog.dashboard')),
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
