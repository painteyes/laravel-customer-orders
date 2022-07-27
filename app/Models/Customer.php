<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Log;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'company'];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($item){

        });

        static::created(function($item){

        });

        static::updating(function($item){

        });

        static::updated(function($item){

        });

        static::deleting(function($customer){

            // Reset all relations
            foreach ($customer->orders as $order) {
                $order->contract()->delete();
                $order->tags()->delete();
                $order->delete();
            }

        });

        static::deleted(function($item){

        });
    }


}
