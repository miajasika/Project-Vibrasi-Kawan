<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    public const ROLE_ADMIN = 'admin';
    public const ROLE_PSIKOLOG = 'psikolog';
    public const ROLE_KLIEN = 'klien';

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'no_hp',
        'is_aktif',
    ];
    protected $hidden = ['password',];
    protected $casts = ['is_aktif' => 'boolean'];

    function psikolog() {
        return $this->hasOne(Psikolog::class, 'user_id', 'user_id');
    }
    function klien() {
        return $this->hasOne(Klien::class, 'user_id', 'user_id');
    }
    function admin() {
        return $this->hasOne(Admin::class, 'user_id', 'user_id');
    }
}

