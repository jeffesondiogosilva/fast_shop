<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;
    
    protected $fillable = ['name', 'description', 'category_id', 'price', 'quantity'];

    public function getFormattedPriceAttribute()
    {
        return 'R$ ' . number_format($this->price, 2, ',', '.');
    }

    public function getFormattedQuantityAttribute()
    {
        return number_format($this->quantity, 0, ',', '.');
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function archive()
    {
        return $this->hasOne(Archive::class);
    }
}
