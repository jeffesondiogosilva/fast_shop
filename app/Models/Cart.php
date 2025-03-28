<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'product_id', 'quantity', 'price'];  

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    /**
     * Relacionamento com o produto (product)
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

