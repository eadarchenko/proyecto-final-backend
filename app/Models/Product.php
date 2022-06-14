<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    protected $fillable = [
        'id', 'title', 'description', 'introduction', 'price'
    ];

    public function order()
    {
        return $this->hasOne(order::class);
    }
     function OrderProduct(){
       return $this->belongsToMany(OrderProduct::class);
   }

}
