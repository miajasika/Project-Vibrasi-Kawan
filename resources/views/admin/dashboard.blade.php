<<<<<<< HEAD
@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('content')
<div class="vk-page-heading"><div><span class="vk-kicker">● PANEL ADMINISTRATOR</span><h1>Dashboard Admin</h1><p>Ringkasan data pengguna Vibrasi Kawan.</p></div></div>
<div class="vk-stat-grid">
    <x-card
        title="Total Klien"
        :value="$jumlahKlien ?? 0"
        subtitle="Akun klien terdaftar"
        icon="bi-people"
    />
    <x-card
        title="Total Psikolog"
        :value="$jumlahPsikolog ?? 0"
        subtitle="Psikolog aktif"
        icon="bi-person-badge"
    />
</div>
<section class="vk-panel"><div class="vk-panel-heading"><div><h2>Selamat datang di panel admin</h2><p>Gunakan panel ini untuk memantau ringkasan data platform.</p></div></div><div class="vk-admin-note"><i class="bi bi-shield-check"></i><span>Menu dan akses fitur tetap mengikuti role serta middleware pada route aplikasi.</span></div></section>
=======
@extends('layouts.dashboard')

@section('title', 'Dashboard Admin')

@section('content')
<div style="max-width: 1000px; margin: 0 auto;">

    <div style="background-color: #ffffff; padding: 24px; border-radius: 16px; margin-bottom: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
        <h2 style="margin: 0 0 6px 0; font-size: 22px; color: #222;">
            Dashboard Administrator — Vibrasi Kawan
        </h2>
        <p style="margin: 0; font-size: 14px; color: #666;">
            Halo, {{ Auth::user()->name ?? 'Admin' }}. Berikut adalah ringkasan data ekosistem saat ini.
        </p>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <div style="background-color: #ffffff; padding: 28px; border-radius: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); border-left: 6px solid #8B3A42;">
            <span style="font-size: 12px; font-weight: 700; color: #888; text-transform: uppercase;">Tenaga Klinis Profesional</span>
            <h1 style="font-size: 40px; margin: 12px 0; color: #222;">{{ $jumlahPsikolog ?? 0 }}</h1>
            <p style="margin: 0; font-size: 14px; color: #555;">Psikolog Terdaftar di Sistem</p>
        </div>

        <div style="background-color: #ffffff; padding: 28px; border-radius: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.03); border-left: 6px solid #D9534F;">
            <span style="font-size: 12px; font-weight: 700; color: #888; text-transform: uppercase;">Ekosistem Konseling</span>
            <h1 style="font-size: 40px; margin: 12px 0; color: #222;">{{ $jumlahKlien ?? 0 }}</h1>
            <p style="margin: 0; font-size: 14px; color: #555;">Klien Terdaftar di Sistem</p>
        </div>
    </div>

</div>
>>>>>>> c3c08e1a2f70ec7a3e6a3d18778a94f1e23c2266
@endsection
