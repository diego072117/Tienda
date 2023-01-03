<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShoppingCartDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantity',
        'price',
        'shopping_cart_id',
        'product_id',
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function total(){
        return $this->quantity * $this->price;
    }
  
}
