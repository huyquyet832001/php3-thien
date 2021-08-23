<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $fillable = [
        'idUser',
        'id_product',
        'content'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
