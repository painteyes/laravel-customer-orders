<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model

{
    protected $fillable = ['customer_id', 'title', 'description', 'cost'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
