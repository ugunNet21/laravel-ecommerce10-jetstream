<?php

namespace App\Models\Backend\Banner;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBanner extends Model
{
    use HasFactory;
    protected $table = "kategori_banners";
    protected $fillable = [
        "name"]
    ;
    public function banners()
    {
        return $this->hasMany(Banner::class, 'category_id');
    }
}
