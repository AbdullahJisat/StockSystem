<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'name', 'quantity', 'price', 'buy_price', 'image'
    ];
    public function category(){
            return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function sell(){
        return $this->hasMany(Sell::class);
}
}