<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier_product extends Model
{
    //
    public function supplier()
    {
        return $this->belongsToMany(Supplier::class, 'supplier_id', 'id');
    }
    public function product()
    {
        return $this->hasMany(Product::class, 'product_id', 'id');
    }

    public function store(\Illuminate\Http\Request $request)
    {
    }
}
