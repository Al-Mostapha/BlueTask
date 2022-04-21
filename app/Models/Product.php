<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_image',
        'product_price',
        'product_sale',
        "product_desc"
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function images(){

        return $this->hasMany(ProductImage::class);

    }


}
