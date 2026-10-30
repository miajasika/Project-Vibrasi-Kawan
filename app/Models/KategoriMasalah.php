<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriMasalah extends Model {
    use HasFactory;

    protected $table = 'kategori_masalah';
    protected $primaryKey = 'kategori_id';
    protected $fillable = ['nama', 'is_aktif',];

    public function rekamKlinis(){
        return $this->belongsToMany(RekamKlinis::class, 'rekam_klinis_kategori', 'kategori_id', 'rekam_klinis_id');
    }
}
