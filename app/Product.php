<?php

namespace App;

use App\Http\Controllers\Supplier;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','quantity', 'description'];
    //
    public function user()
{
    return $this->belongsTo(Supplier::class, "user_id", 'id');

}
    public function supplier()
    {
        return $this->belongsToMany(Supplier::class, "user_id", 'id');

    }
}
