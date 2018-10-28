<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = "brands";

    public function product()
    {
        return $this->hasMany('App\Product', 'id_brand', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\category', 'id_category', 'id');
    }
}
