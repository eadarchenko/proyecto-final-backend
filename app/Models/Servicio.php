<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = [
        'id', 'name', 'phone',  'email', 'province',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
