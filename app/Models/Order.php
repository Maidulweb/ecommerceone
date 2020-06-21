<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Model\User;
use App\Model\OrderProduct;

class Order extends Model
{
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function processor()
    {
        return $this->hasOne(User::class, 'processed_by');
    }

    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
