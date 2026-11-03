<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Admin extends Model
{
    use HasFactory;
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    protected $fillable = ['admin_id',];

    public $timestamps = false;

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
