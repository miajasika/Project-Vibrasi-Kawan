<<<<<<< HEAD
@extends('layouts.app')
@section('title', 'Dashboard Psikolog')
@section('content')
<div class="vk-page-heading"><div><span class="vk-kicker">● RUANG PRAKTIK PSIKOLOG</span><h1>Halo, {{ auth()->user()->name ?? 'Psikolog' }} 👋</h1><p>Berikut ringkasan aktivitas konselingmu hari ini.</p></div></div>
<div class="vk-stat-grid">
    <x-card
        title="Jadwal Hari Ini"
        :value="isset($sesiHariIni) ? $sesiHariIni->count() : 0"
        subtitle="Sesi terjadwal hari ini"
        icon="bi-calendar-check"
    />
    <x-card
        title="Permintaan Baru"
        :value="isset($permintaanBaru) ? $permintaanBaru->count() : 0"
        subtitle="Menunggu konfirmasi"
        icon="bi-inbox"
    />
</div>
<section class="vk-panel"><div class="vk-panel-heading"><div><h2>Permintaan Konseling Baru</h2><p>Permintaan yang menunggu verifikasi</p></div><span class="vk-count-pill">{{ isset($permintaanBaru) ? $permintaanBaru->count() : 0 }} Permintaan</span></div>
    @forelse($permintaanBaru ?? [] as $booking)
        <div class="vk-history-row"><span class="vk-avatar"><i class="bi bi-person"></i></span><div><strong>{{ $booking->klien?->user?->name ?? 'Klien' }}</strong><small>{{ $booking->jadwalPraktik?->tanggal ?? '-' }} · {{ $booking->jadwalPraktik?->jam_mulai ?? '-' }}</small></div><span class="vk-status-wait">Menunggu verifikasi</span></div>
    @empty
        <div class="vk-empty-state"><i class="bi bi-inbox"></i><h3>Tidak ada permintaan baru</h3><p>Permintaan booking dari klien akan muncul di sini.</p></div>
    @endforelse
</section>
<section class="vk-panel"><div class="vk-panel-heading"><div><h2>Jadwal Hari Ini</h2><p>Sesi konsultasi yang telah terkonfirmasi</p></div></div>
    @forelse($sesiHariIni ?? [] as $booking)
        <div class="vk-history-row"><span class="vk-avatar"><i class="bi bi-person"></i></span><div><strong>{{ $booking->klien?->user?->name ?? 'Klien' }}</strong><small>{{ $booking->jadwalPraktik?->jam_mulai ?? '-' }} – {{ $booking->jadwalPraktik?->jam_selesai ?? '-' }}</small></div><span class="vk-status-done">{{ ucfirst($booking->status) }}</span></div>
    @empty
        <div class="vk-empty-state"><i class="bi bi-calendar2"></i><h3>Belum ada sesi hari ini</h3></div>
    @endforelse
</section>
=======
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
>>>>>>> c3c08e1a2f70ec7a3e6a3d18778a94f1e23c2266
@endsection
