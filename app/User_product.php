<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_product extends Model
{
    //
    public function supplier()
    {
        return $this->hasMany(Supplier::class, 'user_id', 'id');
    }
}
