@extends('layouts.dashboard')

@section('title', 'Dashboard Utama Klien')

@section('content')
<div style="max-width: 1000px; margin: 0 auto; font-family: sans-serif; color: #333;">

    <!-- Card Banner Welcoming -->
    <div style="background-color: #ffffff; padding: 32px; border-radius: 16px; margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
        <div style="max-width: 600px;">
            <h1 style="font-size: 24px; font-weight: 700; color: #222; margin: 0; line-height: 1.4;">
                Selamat Datang Kembali, {{ auth()->user()->name ?? 'Ahmad' }}. Siap untuk Melanjutkan Perjalanan Pulihmu?
            </h1>
        </div>
        <div>
            <a href="/booking" style="background-color: #8B3A42; color: #ffffff; padding: 12px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px; display: inline-block;">
                + Buat Janji Konseling Baru
            </a>
        </div>
    </div>

    <!-- Section Jadwal Sesi Terdekat -->
    <div style="background-color: #ffffff; padding: 28px; border-radius: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">

        <!-- Header Section -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h3 style="font-size: 18px; font-weight: 700; margin: 0; display: flex; align-items: center; gap: 8px;">
                📅 Jadwal Sesi Terdekat
            </h3>
            <span style="background-color: #FDF2F2; color: #D9534F; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">
                ● Sesi Terkonfirmasi
            </span>
        </div>

        <!-- Detail Dokter/Psikolog Card -->
        <div style="background-color: #FFF5F5; border-radius: 12px; padding: 20px; margin-bottom: 16px; display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; align-items: center; gap: 16px;">
                <img src="https://via.placeholder.com/50" alt="Psikolog" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;">
                <div>
                    <h4 style="margin: 0; font-size: 16px; color: #222;">Najway Azka, M.Psi.</h4>
                    <p style="margin: 2px 0 0 0; font-size: 12px; color: #777;">Psikolog Klinis Dewasa</p>
                    <small style="color: #aaa; font-size: 11px;">SIPP No. 2021-0492-PK</small>
                </div>
            </div>
            <div>
                <span style="border: 1px solid #8B3A42; color: #8B3A42; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">
                    ✓ Verifikasi / Lunas
                </span>
            </div>
        </div>

        <!-- Detail Info Moda & Waktu -->
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-bottom: 24px;">
            <div style="background-color: #FAFAFA; border: 1px solid #F0F0F0; padding: 16px; border-radius: 12px; display: flex; align-items: center; gap: 12px;">
                <span style="font-size: 20px;">📹</span>
                <div>
                    <span style="font-size: 11px; color: #888; font-weight: 600; text-transform: uppercase;">Moda Konseling</span>
                    <p style="margin: 2px 0 0 0; font-size: 14px; font-weight: 600; color: #333;">Online - Google Meet</p>
                </div>
            </div>
            <div style="background-color: #FAFAFA; border: 1px solid #F0F0F0; padding: 16px; border-radius: 12px; display: flex; align-items: center; gap: 12px;">
                <span style="font-size: 20px;">⏰</span>
                <div>
                    <span style="font-size: 11px; color: #888; font-weight: 600; text-transform: uppercase;">Waktu Pertemuan</span>
                    <p style="margin: 2px 0 0 0; font-size: 14px; font-weight: 600; color: #333;">Senin, 28 Sep • 10:00 WIB</p>
                </div>
            </div>
        </div>

        <!-- Tombol Aksi -->
        <div style="display: flex; gap: 12px;">
            <a href="#" style="background-color: #8B3A42; color: #ffffff; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-size: 14px; font-weight: 600;">
                📹 Lihat Link Google Meet
            </a>
            <button style="background-color: #ffffff; border: 1px solid #8B3A42; color: #8B3A42; padding: 10px 20px; border-radius: 8px; font-size: 14px; font-weight: 600; cursor: pointer;">
                🔄 Ubah Jadwal / Reschedule
            </button>
        </div>

    </div>

</div>
@endsection
