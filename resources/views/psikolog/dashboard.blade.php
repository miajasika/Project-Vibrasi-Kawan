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
@endsection
