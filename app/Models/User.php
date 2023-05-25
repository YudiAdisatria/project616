<?php

namespace App\Models;

use App\Models\Balance;
use App\Models\Transaction;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $primaryKey = 'uid';

    public function balance(){
        //class mana, fk class, fk sini
        return $this->hasMany(Balance::class, 'uid', 'uid');
    }
    public function trx(){
        //class mana, fk class, fk sini
        return $this->hasMany(Transaction::class, 'uid', 'uid');
    }
}
