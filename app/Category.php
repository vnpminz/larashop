<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";

    public function brand()
    {
        return $this->hasMany('App\Brand', 'id_category', 'id');
    }

    public function product()
    {
        return $this->hasManyThrough('App\Product','App\Brand','id_category','id_brand','id');
    }
}
