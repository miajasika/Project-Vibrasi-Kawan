<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Booking;
class Klien extends Model
{
    use HasFactory;
    protected $table = 'klien';
    protected $primaryKey = 'klien_id';
    protected $fillable = ['user_id',];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function booking(){
         return $this->hasMany(Booking::class, 'klien_id', 'klien_id');
    }
}
