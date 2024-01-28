<?php

namespace App\Models\Backend\Banner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = "banners";
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'category_id',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(KategoriBanner::class, 'category_id');
    }
}
