<?php

namespace App\Http\Controllers\Klien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\JadwalPraktik;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'jadwal_id' => ['required', 'exists:jadwal_praktik,jadwal_id']
        ]);

        $klien = Auth::user()->klien;

        try {
            DB::transaction(function () use ($request, $klien) {
                $jadwal = JadwalPraktik::where('jadwal_id', $request->jadwal_id)
                    ->lockForUpdate()
                    ->firstOrFail();

                if (! JadwalPraktik::tersedia()->where('jadwal_id', $jadwal->jadwal_id)->exists()) {
                abort(409, 'Slot jadwal yang dipilih sudah tidak tersedia.');
                }

                $booking = Booking::create([
                    'klien_id' => $klien->klien_id,
                    'jadwal_id' => $jadwal->jadwal_id,
                    'status' => 'menunggu',
                ]);

                Pembayaran::create([
                    'booking_id' => $booking->booking_id,
                    'status' => 'belum_bayar',
                ]);

                $jadwal->update(['status' => 'terbooking']);
            });
        } catch (QueryException $e) {
            return back()->withErrors(['error' => 'Slot baru saja telah dipesan oleh klien lain. Silakan pilih slot yang berbeda.']);
        }

        return redirect()
            ->route('klien.riwayat.index')
            ->with('success', 'Booking terkirim! Menunggu konfirmasi dari psikolog.');
    }
}
