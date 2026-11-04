<?php

namespace App\Http\Controllers\Klien;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $klien = Auth::user()->klien;

        $sesiMendatang = Booking::with('jadwalPraktik.psikolog.user')
            ->where('klien_id', $klien->klien_id)
            ->where('status', 'diterima')
            ->whereHas('jadwalPraktik', function ($query) {
                $query->where('tanggal', '>=', today());
            })
            ->get()
            ->sortBy(fn ($booking) => $booking->jadwalPraktik->tanggal . ' ' . $booking->jadwalPraktik->jam_mulai)
            ->values();

        $riwayatSingkat = Booking::with('jadwalPraktik.psikolog.user')
            ->where('klien_id', $klien->klien_id)
            ->where('status', 'selesai')
            ->whereHas('jadwalPraktik', function ($query) {
                $query->where('tanggal', '<', today());
            })
            ->get()
            ->sortByDesc(fn ($booking) => $booking->jadwalPraktik->tanggal . ' ' . $booking->jadwalPraktik->jam_mulai)
            ->take(5)
            ->values();

        $bookingTerakhir = Booking::with('jadwalPraktik')
            ->where('booking.klien_id', $klien->klien_id)
            ->join('jadwal_praktik', 'booking.jadwal_id', '=', 'jadwal_praktik.jadwal_id')
            ->orderByDesc('jadwal_praktik.tanggal')
            ->orderByDesc('jadwal_praktik.jam_mulai')
            ->select('booking.*')
            ->first();

        $urlBookingBaru = $bookingTerakhir
            ? route('klien.cari-psikolog.show', $bookingTerakhir->jadwalPraktik->psikolog_id)
            : route('klien.cari-psikolog.index');

        return view('klien.dashboard', compact('sesiMendatang', 'riwayatSingkat', 'urlBookingBaru'));
    }
}
