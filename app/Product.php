<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['id','product_name', 'quantity', 'category', 'price', 'details', 'customer_id', 'picture'];

    public function processes(){
        return $this->hasMany(Process::class);
    }

    public function customers(){
        return $this->belongsTo(Customer::class);
    }
}
