<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderProduct extends Model
{
    protected $fillable = [
        'id_order', 'id_product','quantity','price'
    ];

    public function order()
    {
        return $this->belostoOne(order::class);
    }
    public function product()
    {
        return $this->hasMany(product::class);
    }

    public static function getProductsByOrderId($id) {
        return DB::select('SELECT * FROM order_products WHERE order_id=?', array($id));
    }
}
