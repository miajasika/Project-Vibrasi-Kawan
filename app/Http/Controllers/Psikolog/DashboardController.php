<?php

namespace App\Http\Controllers\Psikolog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $psikolog = Auth::user()->psikolog;

        $sesiHariIni= Booking::with('klien.user', 'jadwalPraktik')
            ->join('jadwal_praktik', 'booking.jadwal_id', '=', 'jadwal_praktik.jadwal_id')
            ->where('jadwal_praktik.psikolog_id', $psikolog->psikolog_id)
            ->whereDate('jadwal_praktik.tanggal', today())
            ->whereIn('booking.status', ['diterima', 'selesai'])
            ->orderBy('jadwal_praktik.jam_mulai')
            ->select('booking.*')
            ->get();

        $permintaanBaru = Booking::with('klien.user', 'jadwalPraktik')
            ->join('jadwal_praktik', 'booking.jadwal_id', '=', 'jadwal_praktik.jadwal_id')
            ->where('jadwal_praktik.psikolog_id', $psikolog->psikolog_id)
            ->where('booking.status', 'menunggu')
            ->whereDate('jadwal_praktik.tanggal', '>=', today())
            ->orderBy('jadwal_praktik.tanggal')
            ->orderBy('jadwal_praktik.jam_mulai')
            ->select('booking.*')
            ->get();

        return view('psikolog.dashboard', compact('psikolog', 'sesiHariIni', 'permintaanBaru'));
    }
}
