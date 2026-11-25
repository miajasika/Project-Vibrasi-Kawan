@extends('layouts.app')
@section('title', 'Dashboard Klien')
@section('content')
<div style="max-width: 1000px; margin: 0 auto;">

    <!-- Banner Sambutan -->
    <div style="background-color: #ffffff; padding: 28px; border-radius: 16px; margin-bottom: 24px; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
        <div>
            <h2 style="font-size: 22px; margin: 0 0 6px 0; color: #222;">
                Selamat Datang Kembali, {{ Auth::user()->name ?? 'Klien' }}.
            </h2>
            <p style="margin: 0; color: #666; font-size: 14px;">Siap untuk melanjutkan perjalanan pemulihanmu hari ini?</p>
        </div>
        <a href="#" style="background-color: #8B3A42; color: #ffffff; padding: 12px 20px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 14px;">
            + Buat Janji Konseling Baru
        </a>
    </div>

    <!-- Jadwal Sesi Mendatang -->
    <div style="background-color: #ffffff; padding: 24px; border-radius: 16px; margin-bottom: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
        <h3 style="font-size: 18px; margin: 0 0 16px 0; color: #222;"> Jadwal Sesi Mendatang</h3>

        @forelse ($sesiMendatang as [] $b )
            <div style="background-color: #FFF5F5; border: 1px solid #FADBD8; border-radius: 12px; padding: 20px; margin-bottom: 12px; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <h4 style="margin: 0 0 4px 0; font-size: 16px; color: #222;">
                        {{ $b->jadwalPraktik->psikolog->user->name }}
                    </h4>
                    <p style="margin: 0 0 8px 0; font-size: 13px; color: #666;">
                        {{ $b->jadwalPraktik->psikolog->spesialisasi }} • SIPP: {{ $b->jadwalPraktik->psikolog->no_sipp }}
                    </p>
                    <p style="margin: 0; font-size: 14px; color: #333;">
                        <strong>Waktu:</strong> {{ $b->jadwalPraktik->tanggal }} ({{ $b->jadwalPraktik->jam_mulai }} - {{ $b->jadwalPraktik->jam_selesai }}) |
                        <strong>Moda:</strong> {{ ucfirst($b->mode) }}
                    </p>
                    @if($b->mode === 'online' && $b->link_meet)
                        <p style="margin: 6px 0 0 0; font-size: 13px;">
                            <strong>Link Meet:</strong> <a href="{{ $b->link_meet }}" target="_blank" style="color: #8B3A42;">{{ $b->link_meet }}</a>
                        </p>
                    @elseif($b->lokasi)
                        <p style="margin: 6px 0 0 0; font-size: 13px;">
                            <strong>Lokasi:</strong> {{ $b->lokasi }}
                        </p>
                    @endif
                </div>
                <div>
                    <span style="background-color: #d4edda; color: #155724; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">
                        {{ ucfirst($b->status) }}
                    </span>
                </div>
            </div>
        @empty
            <div style="text-align: center; padding: 32px; background-color: #FAFAFA; border-radius: 12px; color: #777;">
                <p style="margin: 0;">Belum ada jadwal sesi konseling yang akan datang.</p>
            </div>
        @endforelse
    </div>

    <!-- Riwayat Konseling Singkat -->
    <div style="background-color: #ffffff; padding: 24px; border-radius: 16px; box-shadow: 0 2px 8px rgba(0,0,0,0.03);">
        <h3 style="font-size: 18px; margin: 0 0 16px 0; color: #222;">🕒 Riwayat Konseling Singkat</h3>

        @forelse($riwayatSingkat ?? [] as $r)
            <div style="border-bottom: 1px solid #eee; padding: 14px 0; display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <strong style="font-size: 15px; color: #222;">{{ $r->jadwalPraktik->psikolog->user->name }}</strong>
                    <p style="margin: 4px 0 0 0; font-size: 13px; color: #666;">
                        Tanggal: {{ $r->jadwalPraktik->tanggal }} • Moda: {{ ucfirst($r->mode) }}
                    </p>
                </div>
                <span style="background-color: #e2e3e5; color: #383d41; padding: 4px 10px; border-radius: 12px; font-size: 12px; font-weight: 600;">
                    Selesai
                </span>
            </div>
        @empty
            <div style="text-align: center; padding: 24px; background-color: #FAFAFA; border-radius: 12px; color: #777;">
                <p style="margin: 0;">Belum ada riwayat sesi konseling yang selesai.</p>
            </div>
        @endforelse
    </div>

</div>
@endsection
