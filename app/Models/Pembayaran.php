<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;
use App\Models\Admin;

class Pembayaran extends Model{
    use HasFactory;
    protected $table = 'pembayaran';
    protected $primaryKey = 'pembayaran_id';
    protected $fillable = [
        'booking_id',
        'bukti_pembayaran',
        'status_pembayaran',
        'alasan_penolakan',
        'diverifikasi_oleh',
        'diverifikasi_at',
    ];
    public function booking(){
        return $this->belongsTo(Booking::class,'booking_id', 'booking_id');
    }
    public function admin(){
        return $this->belongsTo(Admin::class, 'diverfikasi_oleh', 'admin_id');
    }
}
