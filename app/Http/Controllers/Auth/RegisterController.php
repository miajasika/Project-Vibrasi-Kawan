<?php

namespace App\Http\Controllers\Auth;

Use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Klien;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller {
    public function register(RegisterRequest $request){

        $validated = $request->validated();

    DB::transaction(function () use ($validated) {
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'no_hp' => $validated['no_hp'],
            'password' => Hash::make($validated['password']),
            'role' => User::ROLE_KLIEN,
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
