<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['id','product_name', 'details', 'customer', 'picture'];

    public function processes(){
        return $this->hasMany(Process::class);
    }
}
