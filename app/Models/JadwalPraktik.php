<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPraktik extends Model
{
    use HasFactory;

    protected $table = 'jadwal_praktik';
    protected $primaryKey = 'jadwal_id';
    protected $fillable = [
        'psikolog_id',
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'status',
    ];

    public function psikolog(){
        return $this->belongsTo(Psikolog::class, 'psikolog_id','psikolog_id');
    }
    public function booking(){
        return $this->hasMany(Booking::class, 'jadwal_id', 'jadwal_id');
    }

}
