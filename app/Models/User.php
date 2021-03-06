<?php

namespace App\Models;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        // 'name',
        // 'email',
        // 'password',
        'name', 'email', 'password', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // shahad
//     const ADMIN_TYPE = 'admin';
// const DEFAULT_TYPE = 'default';
// public function isAdmin()    {        
//     return $this->type === self::ADMIN_TYPE;    
// }
    public function donations(){
        return $this->hasMany('App\Models\donations');
    }

public function infoconnects(){
    return $this->hasMany('App\Models\infoconnectt');
}
}