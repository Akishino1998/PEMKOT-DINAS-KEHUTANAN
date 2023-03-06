<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function Role()
    {
        return $this->belongsTo(AuthRole::class, 'role', 'id');
    }
    public function Dinas(){
        return $this->belongsTo(RefDinas::class, 'dinas', 'id');
    }
    public function Jabatan(){
        return $this->belongsTo(RefJabatan::class, 'jabatan', 'id');
    }
    public function Pegawai()
    {
        return $this->hasOne(User::class, 'id_user', 'id');
    }
}
