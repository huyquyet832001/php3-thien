<?php

namespace App\Models;

use Database\Seeders\ProductSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    public $fillable = [
        'name',
        'cate_id',
        'price',
        'quantity',
        'promotion_price',
        'detail'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id');
    }
    public function bill_detail()
    {
        return $this->hasMany(BillDetail::class, 'id_product');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class, 'id_product');
    }
    public function galleries()
    {
        return $this->hasMany(ProductGallery::class, 'product_id');
    }
}
