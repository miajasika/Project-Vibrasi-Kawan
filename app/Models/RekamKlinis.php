<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;
use App\Models\KategoriMasalah;

class RekamKlinis extends Model{
    use HasFactory;
    protected $table = 'rekam_klinis';
    protected $primaryKey = 'rekam_klinis_id';
    protected $fillable = [
        'booking_id',
        'file',
        'catatan_teks',
        'is_berisiko',
        'status_rekam',
    ];

    function booking(){
        return $this->belongsTo(Booking::class, 'booking_id','booking_id');
    }
    function kategoriMasalah(){
        return $this->belongsToMany(kategoriMasalah::class, 'rekam_klinis_kategori', 'rekam_klinis_id', 'kategori_id');
    }
}
