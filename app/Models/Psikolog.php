<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psikolog extends Model
{
    use HasFactory;
    protected $table = 'psikolog';
    protected $primaryKey = 'psikolog_id';
    protected $fillable = [
        'user_id',
        'no_sipp',
        'spesialisasi',
        'deskripsi',
        'foto',
    ];

    function user(){
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    function jadwalPraktik(){
        return $this->hasMany(JadwalPraktik::class, 'psikolog_id', 'psikolog_id');
    }

}
