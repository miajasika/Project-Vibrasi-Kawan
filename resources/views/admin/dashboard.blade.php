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
@endsection
