<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Klien;
use illuminate\support\Facades\Hash;

class RegisterController extends Controller {
    public function register(Request $request){
        //validasi data form
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_hp' => ['required', 'string', 'max:15'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],],
            [
            'name.required'=>'Nama lengkap wajib diisi',
            'email.required'=>'Email wajib diisi',
            'email.unique'=>'Email sudah terdaftar di sistem',
            'no_hp.required'=>'Nomor HP/WhatsApp wajib diisi',
            'password.required'=>'Kata sandi wajib diisi',
            'password.min'=>'Kata sandi minimal harus 8 karakter',
            'password.confirmed'=>'Konfirmasi kata sandi tidak cocok',
        ]);
        //Save ke database
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'no_hp' => $validated['no_hp'],
            'password' => Hash::make($validated['password']),
            'role' => 'klien',
        ]);

        Klien::create([
            'user_id' => $user->id,
        ]);

        return redirect('/login')->with('Success', 'Registrasi berhasil! Silahkan login');
    }
    public function showRegisterForm(){
        return view('auth.register');
    }
}
