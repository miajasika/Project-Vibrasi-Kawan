@extends('layouts.app')
@section('title', 'Dashboard Klien')
@section('content')
<div class="vk-page-heading">
    <div><span class="vk-kicker">● RUANG KONSELING PRIBADI</span><h1>Halo, {{ auth()->user()->name ?? 'Sahabat' }} 👋</h1><p>Bagaimana kabarmu hari ini? Ruang amanmu selalu siap mendengarkan tanpa menghakimi.</p></div>
    <a href="#" class="vk-btn vk-btn-primary vk-heading-action"><i class="bi bi-calendar-plus"></i> Booking Sesi Baru</a>
</div>
<section class="vk-panel">
    <div class="vk-panel-heading"><div class="vk-panel-icon"><i class="bi bi-calendar2-check"></i></div><div><h2>Sesi Mendatang</h2><p>Jadwal konsultasi aktif yang telah dikonfirmasi</p></div><span class="vk-count-pill">{{ isset($sesiMendatang) ? $sesiMendatang->count() : 0 }} Sesi Terjadwal</span></div>
    @forelse ($sesiMendatang ?? [] as $booking)
        @php
            $jadwal = $booking->jadwalPraktik;
            $psikolog = $jadwal?->psikolog;
            $namaPsikolog = $psikolog?->user?->name ?? 'Psikolog';
            $tanggal = $jadwal?->tanggal ? \Illuminate\Support\Carbon::parse($jadwal->tanggal)->translatedFormat('l, d F Y') : '-';
        @endphp
        <article class="vk-session-card">
            <div class="vk-session-top"><div class="vk-person-info"><span class="vk-avatar vk-avatar-xl"><i class="bi bi-person"></i></span><div><h3>{{ $namaPsikolog }}</h3><p>Psikolog Klinis</p></div></div><span class="vk-session-mode"><i class="bi bi-camera-video"></i> {{ $jadwal?->metode_konseling ?? 'Sesi Konseling' }}</span></div>
            <div class="vk-session-detail"><div><strong><i class="bi bi-calendar-event"></i> {{ $tanggal }}</strong><span class="vk-dot">•</span><span>{{ $jadwal?->jam_mulai ?? '-' }} - {{ $jadwal?->jam_selesai ?? '-' }} WIB</span></div></div>
        </article>
    @empty
        <div class="vk-empty-state"><i class="bi bi-calendar-heart"></i><h3>Belum ada sesi terjadwal</h3><p>Kamu bisa mulai dengan menemukan psikolog yang sesuai dengan kebutuhanmu.</p><a class="vk-btn vk-btn-primary" href="#">Cari Psikolog</a></div>
    @endforelse
</section>
@if(isset($riwayatSingkat) && $riwayatSingkat->isNotEmpty())
<section class="vk-panel vk-history-panel"><div class="vk-panel-heading"><div><h2>Riwayat Konseling</h2><p>Beberapa sesi yang telah kamu selesaikan</p></div><a href="#" class="vk-text-link">Lihat riwayat <i class="bi bi-arrow-right"></i></a>
    @foreach($riwayatSingkat as $riwayat)
        <div class="vk-history-row"><span class="vk-history-icon"><i class="bi bi-check2-circle"></i></span><div><strong>{{ $riwayat->jadwalPraktik?->psikolog?->user?->name ?? 'Psikolog' }}</strong><small>{{ $riwayat->jadwalPraktik?->tanggal ? \Illuminate\Support\Carbon::parse($riwayat->jadwalPraktik->tanggal)->translatedFormat('d F Y') : '-' }}</small></div><span class="vk-status-done">Selesai</span></div>
    @endforeach
</section>
@endif
@endsection
