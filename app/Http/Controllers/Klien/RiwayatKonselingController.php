<?php

namespace App\Http\Controllers\Klien;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class RiwayatKonselingController extends Controller
{
    public function index(Request $request)
    {
        $klien = Auth::user()->klien;

        $riwayatKonseling = Booking::with('jadwalPraktik.psikolog.user', 'pembayaran')
            ->where('klien_id', $klien->klien_id)
            ->where($request->filled('status'), function ($query) use ($request) {
                $query->where('status', $request->status);
            })
            ->latest('created_at')
            ->paginate(10)
            ->withQueryString();

        return view('klien.riwayat.index', compact('riwayatKonseling'));
    }
}
