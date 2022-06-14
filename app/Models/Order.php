<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'id', 'name', 'lastname', 'phone', 'email', 'adress','user_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function product()
    {
        return $this->hasOne(product::class);
    }
}
