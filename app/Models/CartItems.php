<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    use HasFactory;

    protected $table ="shop_cart_items";
    protected $fillable = ["chart_id", "product_id", "product_count"];

    public function cart(Type $var = null)
    {
        return $this->belongsTo(User::class);
    }
}
