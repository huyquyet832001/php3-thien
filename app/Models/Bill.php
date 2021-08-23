<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'bills';
    protected $fillable = [
        'id_User',
        'total',
        'address',
        'phone',
        'payment',
        'note',
    ];
    public function bill_detail()
    {
        return $this->hasMany(BillDetail::class, 'id_bill');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_User');
    }
}
