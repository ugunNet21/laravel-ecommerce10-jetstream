<?php

namespace App\Models\Backend\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'subcategory_id',
        'brand_id',
        'product_code',
        'discount',
        'tax',
        'favorite',
        'short_description',
        'long_description',
        'selling_price',
        'purchase_price',
        'stock',
        'image',
    ];
    public function categoryProduct()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id');
    }
}
