<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_icon',
        'category_title',
        'category_img',
        'category_desc'
    ];

    public function brandes()
    {
        return $this->belongsToMany(Brand::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
