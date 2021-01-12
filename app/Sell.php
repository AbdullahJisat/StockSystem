<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $fillable = [
        'category_id', 'customer_id'];
    public function category(){
            return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function customer(){
            return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
