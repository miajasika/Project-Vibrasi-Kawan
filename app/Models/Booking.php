<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Klien;
use App\Models\JadwalPraktik;
use App\Models\Pembayaran;
use App\Models\RekamKlinis;

class Booking extends Model {
    use HasFactory;
    protected $table = 'booking';
    protected $primaryKey = 'booking_id';
    protected $fillable = [
        'klien_id',
        'jadwal_id',
        'mode',
        'lokasi',
        'link_meet',
        'catatan_klien',
        'status',
        'alasan_penolakan',
    ];

    function klien(){
        return $this->belongsTo(Klien::class, 'klien_id', 'klien_id');
    }

    function jadwalPraktik(){
        return $this->belongsTo(JadwalPraktik::class, 'jadwal_id', 'jadwa;_id');
    }

    function pembayaran(){
        return $this->hasOne(Pembayaran::class, 'booking_id', 'booking_id');
    }

    function rekamKlinis(){
        return $this->hasOne(RekamKlinis::class, 'booking_id', 'booking_id');
    }
}
