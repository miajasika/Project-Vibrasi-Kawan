<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Klien;
use App\Models\Psikolog;

class DashboardController extends Controller
{
    public function index()
    {
        $jumalahKlien = Klien::count();
        $jumlahPsikolog = Psikolog::count();

        return view('admin.dashboard', compact('jumalahKlien', 'jumlahPsikolog'));
    }
}
