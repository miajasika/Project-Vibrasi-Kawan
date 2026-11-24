<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Klien;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller {
    public function register(Request $request){
        //validasi data form
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'no_hp'    => ['required', 'string', 'max:15'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'name.required'      => 'Nama lengkap wajib diisi.',
            'name.string'        => 'Nama lengkap harus berupa teks.',
            'name.max'           => 'Nama lengkap maksimal 255 karakter.',
            'email.required'     => 'Email wajib diisi.',
            'email.string'       => 'Email harus berupa teks.',
            'email.email'        => 'Format email tidak valid.',
            'email.max'          => 'Email maksimal 255 karakter.',
            'email.unique'       => 'Email sudah terdaftar di sistem.',
            'no_hp.required'     => 'Nomor HP/WhatsApp wajib diisi.',
            'no_hp.string'       => 'Nomor HP harus berupa teks.',
            'no_hp.max'          => 'Nomor HP maksimal 15 karakter.',
            'password.required'  => 'Kata sandi wajib diisi.',
            'password.string'    => 'Kata sandi harus berupa teks.',
            'password.min'       => 'Kata sandi minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
        ]);
    DB::transaction(function () use ($validated) {
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'no_hp' => $validated['no_hp'],
            'password' => Hash::make($validated['password']),
            'role' => 'klien',
            'is_aktif' => true,
        ]);

        Klien::create([
            'user_id' => $user->user_id,
        ]);
    });

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login');
    }

    public function showRegisterForm() {
        return view('auth.register');
    }
}
