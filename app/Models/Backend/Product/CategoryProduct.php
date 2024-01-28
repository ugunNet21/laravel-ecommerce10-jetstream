<?php

namespace App\Models\Backend\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryProduct extends Model
{
    use HasFactory;
    protected $table = 'categories_product';
    protected $fillable = [
        "name",
        "slug",
        "status",
        "parent_id",
        "images",
    ];
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}
