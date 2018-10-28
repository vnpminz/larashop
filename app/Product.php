<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    public function brand()
    {
        return $this->belongsTo('App\Brand', 'id_brand', 'id');
    }
    
    public function bill_details()
    {
        return $this->hasMany('App\BillDetail', 'id_product', 'id');
    }
}

