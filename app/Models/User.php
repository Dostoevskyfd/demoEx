<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Work;
use Illuminate\Database\Eloquent\Relations\HasOne;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
const ADMIN_ROLE='admin';
public function isAdmin(){
    return $this->role===self::ADMIN_ROLE;
}

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'middlename',
        'lastname',
        'school',
        'class',
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
        'password' => 'hashed',
    ];
    public function works(): HasOne
    {
        return $this->hasOne(Work::class);
    }
    public function fullName(){
        return $this->name. ' '.$this->middlename.' '.$this->lastname;
    }
}
