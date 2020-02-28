<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    //
    public function order()
    {
        return $this->belongsToMany(Order::class, 'order_id', 'id');
    }
    public function product()
    {
        return $this->belongsToMany(Product::class, 'order_id', 'id');
    }
}
