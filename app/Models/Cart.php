<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = "shop_charts";

    protected $fillable = ["user_id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items(Type $var = null)
    {
        return $this->hasMany(CartItems::class);
    }
}
