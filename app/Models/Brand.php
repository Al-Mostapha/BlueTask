<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_icon',
        'brand_title',
        'brand_img',
        'brand_desc'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
