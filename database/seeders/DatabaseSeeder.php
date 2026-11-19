<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Booking;
use App\Models\JadwalPraktik;
use App\Models\Klien;
use App\Models\Psikolog;
use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminUser = User::create([
            'name' => 'Admin Vibrasi', 'email' => 'admin@vibrasikawan.test',
            'password' => Hash::make('admin123'), 'role' => 'admin',
            'no_hp' => '081203450123', 'is_aktif' => true,
        ]);
        Admin::create(['user_id' => $adminUser->user_id]);

        $psikologUser = User::create([
            'name' => 'Psikolog tes', 'email' => 'psikolog@vibrasikawan.test',
            'password' => Hash::make('PsikologTes'), 'role' => 'psikolog',
            'no_hp' => '081304560123', 'is_aktif' => true,
        ]);

        $psikolog = Psikolog::create([
            'user_id' => $psikologUser->user_id,
            'no_sipp' => 'SIPP-0001-2026',
            'spesialisasi' => 'Psikologi Klinis',
            'deskripsi' => 'Psikolog klinis untuk konseling remaja',
        ]);
        $klienUser = User::create([
            'name' => 'Klien tes', 'email' => 'klien@vibrasikawan.test',
            'password' => Hash::make('KlienTes'), 'role' => 'klien',
            'no_hp' => '081405670123', 'is_aktif' => true,
        ]);
        $klien = Klien::create(['user_id' => $klienUser->user_id]);

        $klien2User = User::create([
            'name' => 'Klien 2', 'email' => 'klien2@vibrasikawan.test',
            'password' => Hash::make('passklien2'), 'role' => 'klien',
            'no_hp' => '081506780123', 'is_aktif' => true,
        ]);
        Klien::create(['user_id' => $klien2User->user_id]);

        $slot = fn ($tanggal, $mulai, $selesai, $status) => JadwalPraktik::create([
            'psikolog_id' => $psikolog->psikolog_id,
            'tanggal' => $tanggal,
            'jam_mulai' => $mulai,
            'jam_selesai' => $selesai,
            'status' => $status,
        ]);

        Booking::create([
            'klien_id' => $klien->klien_id,
            'jadwal_id' => $slot(today(), '14:00:00', '15:00:00', 'terbooking')->jadwal_id,
            'mode' => 'online', 'link_meet' => 'https://meet.example.com',
            'status' => 'diterima',
        ]);

        Booking::create([
            'klien_id' => $klien->klien_id,
            'jadwal_id' => $slot(today()->addDay(), '10:00:00', '11:00:00', 'terbooking')->jadwal_id,
            'mode' => 'offline', 'lokasi' => 'Ruang Konseling A',
             'status' => 'diterima',
        ]);
        Booking::create([
            'klien_id' => $klien->klien_id,
            'jadwal_id' => $slot(today()->addDays(2), '09:00:00', '10:00:00', 'terbooking')->jadwal_id,
            'mode' => 'online', 'catatan_klien' => 'Ingin konsultasi soal stres kuliah.',
            'status' => 'menunggu_verifikasi',
        ]);
        foreach ([7, 6] as $hariLalu) {
            Booking::create([
                'klien_id' => $klien->klien_id,
                'jadwal_id' => $slot(today()->subDays($hariLalu), '13:00:00', '14:00:00', 'terbooking')->jadwal_id,
                'mode' => 'online', 'link_meet' => 'https://meet.example.com',
                'status' => 'selesai',
        ]);
        }
        foreach ([3, 4, 5] as $hariKe) {
            $slot(today()->addDays($hariKe), '09:00:00', '10:00:00', 'tersedia');
        }
    }
}
