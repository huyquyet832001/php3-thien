<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    //map class User với bảng 'users' trong cơ sở dữ liệu
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'gender',
        'phone_number',
        'role'
    ];

    /**
     * The attributes that should be hidden for arrays. ẩn
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
    public function comment()
    {
        return $this->hasMany(Comment::class, 'idUser');
    }
    public function bill()
    {
        return $this->hasMany(Bill::class, 'id_User');
    }
}
