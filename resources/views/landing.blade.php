<<<<<<< HEAD
@extends('layouts.guest')

@section('title', 'Konseling yang Mudah Diakses')

@section('content')
<header class="vk-public-nav">
    <a class="vk-brand" href="{{ url('/') }}"><span class="vk-logo" style="overflow: hidden; background: transparent;"><img src="{{ asset('assets/VIBRASI KAWAN LOGO.png') }}" alt="Logo Vibrasi Kawan" style="width: 100%; height: 100%; object-fit: cover;"></span><span>Vibrasi Kawan</span></a>
    <nav class="vk-public-links">
        <a href="#layanan">Layanan</a><a href="#psikolog">Teman Psikolog</a><a href="#tentang">Tentang Kami</a><a href="#bantuan">Bantuan & FAQ</a>
=======
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vibrasi Kawan - Ruang Aman Pemulihan Mental</title>
</head>
<body style="margin: 0; font-family: sans-sertif; background-color: #FDF8F8; color: #333;">

    <nav style="background-color: #ffffff; padding: 16px 40px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 6px rgba(0,0,0,0.04);">
        <div style="display: flex; align-items: center; gap: 12px;">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Vibrasi Kawan" style="height: 40px; width: auto;">
            <strong style="font-size: 18px; color: #8B3A42;">Vibrasi Kawan</strong>
        </div>
        <div style="display: flex; gap: 12px;">
            <a href="/login" style="padding: 8px 18px; border: 1px solid #8B3A42; color: #8B3A42; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px;">Masuk</a>
            <a href="/register" style="padding: 8px 18px; background-color: #8B3A42; color: #ffffff; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px;">Daftar</a>
        </div>
>>>>>>> c3c08e1a2f70ec7a3e6a3d18778a94f1e23c2266
    </nav>
    <div class="vk-nav-actions"><a class="vk-btn vk-btn-soft" href="{{ route('login') }}">Masuk</a><a class="vk-btn vk-btn-primary" href="{{ route('register') }}">Daftar</a></div>
</header>

<<<<<<< HEAD
<main class="vk-landing">
    <section class="vk-hero">
        <span class="vk-eyebrow"><i class="bi bi-heart"></i> Sahabat Sehat Mentalmu</span>
        <h1>Konseling yang Mudah Diakses, Kapan<br class="desktop-only"> Pun Kamu Butuh</h1>
        <p>Menghubungkan kamu dengan psikolog profesional dan berlisensi terpercaya untuk sesi<br class="desktop-only"> konseling online maupun tatap muka secara aman, nyaman, dan fleksibel.</p>
        <div class="vk-hero-actions"><a class="vk-btn vk-btn-primary vk-btn-large" href="{{ route('register') }}">Daftar Sekarang <i class="bi bi-arrow-right"></i></a><a class="vk-btn vk-btn-white vk-btn-large" href="{{ route('login') }}">Masuk</a></div>
        <div class="vk-trust-row"><span><i class="bi bi-shield-check"></i> 100% Rahasia & Aman</span><b>•</b><span><i class="bi bi-person-check"></i> Psikolog Berlisensi S.Psi / M.Psi</span><b>•</b><span><i class="bi bi-calendar-week"></i> Sesi Fleksibel Online/Offline</span></div>
    </section>

    <section class="vk-about" id="tentang">
        <div class="vk-about-copy">
            <span class="vk-eyebrow vk-eyebrow-pale"><i class="bi bi-flower1"></i> Pemahaman Bersama</span>
            <h2>Apa itu Konseling?</h2>
            <p>Konseling adalah ruang aman dan rahasia bersama profesional kesehatan mental untuk membantu kamu memahami diri, mengatasi kecemasan, mengurai dinamika emosi, serta menemukan solusi terbaik atas tantangan hidup yang sedang dihadapi tanpa rasa dihakimi.</p>
            <div class="vk-benefits">
                <article><i class="bi bi-lock"></i><strong>Ruang Aman</strong><small>Semua cerita terjaga kode etik profesi.</small></article>
                <article><i class="bi bi-emoji-smile"></i><strong>Tanpa Dihakimi</strong><small>Didengarkan dengan penuh empati murni.</small></article>
                <article><i class="bi bi-signpost-split"></i><strong>Terarah</strong><small>Langkah konkret pemulihan terukur.</small></article>
            </div>
        </div>
        <div class="vk-about-image"><img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=1000&q=85" alt="Ruang konseling yang nyaman"><span><i class="bi bi-leaf"></i> Sesi hening & terpercaya</span></div>
    </section>

    <section class="vk-psychologists" id="psikolog">
        <div class="vk-section-heading"><div><h2>Psikolog Kami</h2><p>Temukan mitra dialog berlisensi yang sesuai dengan kebutuhan hatimu</p></div><a href="{{ route('register') }}">Lihat semua <i class="bi bi-arrow-right"></i></a></div>
        <div class="vk-psychologist-grid">
            @foreach ([['drg. Sarah Amanda, M.Psi., Psikolog','Online & Offline'],['Dimas Prasetyo, M.Psi., Psikolog','Online Video Call'],['Nadia Utami, M.Psi., Psikolog','Online & Offline'],['Reza Firmansyah, M.Psi., Psikolog','Online & Offline']] as $i => $person)
                <article class="vk-psychologist-card"><span class="vk-avatar"><i class="bi bi-person"></i></span><div><strong>{{ $person[0] }}</strong><small>Format Konseling</small><small><i class="bi bi-camera-video"></i> {{ $person[1] }}</small></div><a class="vk-btn vk-btn-primary vk-btn-book" href="{{ route('register') }}">Booking <i class="bi bi-calendar-plus"></i></a></article>
            @endforeach
        </div>
    </section>
</main>
@endsection
=======
    <main style="max-width: 900px; margin: 70px auto; padding: 0 20px; text-align: center;">
        <h1 style="font-size: 36px; color: #222; margin-bottom: 16px;">Ruang Aman untuk Mendengar & Memulihkan</h1>
        <p style="font-size: 16px; color: #666; line-height: 1.6; max-width: 650px; margin: 0 auto 32px auto;">
            Konsultasikan kesehatan mentalmu bersama psikolog klinis berlisensi (SIPP) secara online maupun offline dengan privasi yang terjaga.
        </p>
        <a href="/register" style="background-color: #8B3A42; color: #ffffff; padding: 14px 28px; border-radius: 10px; text-decoration: none; font-weight: 600; font-size: 16px; display: inline-block;">
            Mulai Konseling Sekarang
        </a>
    </main>

</body>
</html> "
>>>>>>> c3c08e1a2f70ec7a3e6a3d18778a94f1e23c2266
