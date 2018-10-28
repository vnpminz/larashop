<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bills";

    public function bill_details()
    {
        return $this->belongsTo('App\BillDetail', 'id_bill', 'id');
    }

    public function bill()
    {
        return $this->belongsTo('App\Customer', 'id_customer', 'id');
    }
}
