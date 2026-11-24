@extends('layouts.dashboard')

@section('title', 'Dashboard Psikolog')

@section('content')
<div style="max-width: 1000px; margin: 0 auto;">

    <!-- Profil Psikolog -->
    <div style="background-color: #ffffff; padding: 24px; border-radius: 16px; margin-bottom: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
        <h2 style="margin: 0 0 6px 0; font-size: 22px; color: #222;">
            Selamat Bertugas, {{ Auth::user()->name ?? 'Psikolog' }}
        </h2>
        <p style="margin: 0; font-size: 14px; color: #666;">
            Spesialisasi: <strong>{{ $psikolog->spesialisasi ?? '-' }}</strong> |
            No. SIPP: <strong>{{ $psikolog->no_sipp ?? '-' }}</strong>
        </p>
    </div>

    <!-- Jadwal Sesi Hari Ini -->
    <div style="background-color: #ffffff; padding: 24px; border-radius: 16px; margin-bottom: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
        <h3 style="font-size: 18px; margin: 0 0 16px 0; color: #222;">📅 Jadwal Sesi Hari Ini</h3>

        @forelse($sesiHariIni ?? [] as $sesi)
            <div style="background-color: #FFF5F5; padding: 16px 20px; border-radius: 12px; margin-bottom: 12px; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <span style="font-size: 13px; font-weight: 700; color: #8B3A42;">
                        {{ $sesi->jadwalPraktik->jam_mulai }} - {{ $sesi->jadwalPraktik->jam_selesai }} WIB
                    </span>
                    <h4 style="margin: 4px 0; font-size: 16px; color: #222;">
                        Klien: {{ $sesi->klien->user->name }}
                    </h4>
                    <p style="margin: 0; font-size: 13px; color: #555;">
                        Moda: {{ ucfirst($sesi->mode) }}
                        @if($sesi->catatan_klien)
                            • Catatan: <i>"{{ $sesi->catatan_klien }}"</i>
                        @endif
                    </p>
                </div>
                <div>
                    <span style="background-color: #d4edda; color: #155724; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">
                        {{ ucfirst($sesi->status) }}
                    </span>
                </div>
            </div>
        @empty
            <div style="text-align: center; padding: 28px; background-color: #FAFAFA; border-radius: 12px; color: #777;">
                <p style="margin: 0;">Tidak ada jadwal sesi konseling untuk hari ini.</p>
            </div>
        @endforelse
    </div>

    <!-- Permintaan Booking Baru -->
    <div style="background-color: #ffffff; padding: 24px; border-radius: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
        <h3 style="font-size: 18px; margin: 0 0 16px 0; color: #222;">🔔 Permintaan Booking Baru</h3>

        @forelse($permintaanBaru ?? [] as $req)
            <div style="border: 1px solid #eee; padding: 18px; border-radius: 12px; margin-bottom: 12px; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h4 style="margin: 0 0 4px 0; font-size: 16px; color: #222;">
                        {{ $req->klien->user->name }}
                    </h4>
                    <p style="margin: 0 0 6px 0; font-size: 13px; color: #666;">
                        Jadwal Diminta: <strong>{{ $req->jadwalPraktik->tanggal }}</strong> ({{ $req->jadwalPraktik->jam_mulai }} - {{ $req->jadwalPraktik->jam_selesai }}) • Moda: {{ ucfirst($req->mode) }}
                    </p>
                    @if($req->catatan_klien)
                        <p style="margin: 0; font-size: 13px; color: #444; background: #F9F9F9; padding: 8px 12px; border-radius: 6px;">
                            "{{ $req->catatan_klien }}"
                        </p>
                    @endif
                </div>
                <div style="display: flex; gap: 8px;">
                    <a href="#" style="background-color: #8B3A42; color: #ffffff; padding: 8px 16px; border-radius: 8px; text-decoration: none; font-size: 13px; font-weight: 600;">✓ Terima</a>
                    <a href="#" style="background-color: #ffffff; border: 1px solid #ccc; color: #555; padding: 8px 16px; border-radius: 8px; text-decoration: none; font-size: 13px; font-weight: 600;">Tolak</a>
                </div>
            </div>
        @empty
            <div style="text-align: center; padding: 28px; background-color: #FAFAFA; border-radius: 12px; color: #777;">
                <p style="margin: 0;">Belum ada permintaan booking baru yang menunggu verifikasi.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection
