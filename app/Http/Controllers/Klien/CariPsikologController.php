<?php

namespace App\Http\Controllers\Klien;

use App\Http\Controllers\Controller;
use App\Models\Psikolog;
use Illuminate\Http\Request;

class CariPsikologController extends Controller
{
    public function index(Request $request)
    {
        $psikolog = Psikolog::with('user')
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->whereHas('user', function ($u) use ($request) {
                    $u->where('name', 'like', '%' . $request->q . '%');
                });
            })

            ->when($request->filled('tanggal'), function ($query) use ($request) {
            $query->whereHas('jadwalPraktik', function ($j) use ($request) {
                $j->tersedia()->where('tanggal', $request->tanggal);
                });
})
            ->withCount(['jadwalPraktik as slot_tersedia' => fn ($j)=> $j->tersedia()])
            ->paginate(9)
            ->withQueryString();

        return view('klien.psikolog.index', compact('psikolog'));
    }

    public function show(Request $request, Psikolog $psikolog)
    {
        $psikolog->load('user');

        $slot = $psikolog->jadwalPraktik()
            ->tersedia()
            ->when($request->filled('tanggal'), fn ($query) => $query->where('tanggal', $request->tanggal))
            ->orderBy('tanggal')
            ->orderBy('jam_mulai')
            ->get();

        return view('klien.psikolog.show', compact('psikolog', 'slot'));
    }
}
