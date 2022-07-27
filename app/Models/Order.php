<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Contract;
use Illuminate\Support\Facades\Log;


class Order extends Model

{
    use SoftDeletes;

    protected $fillable = ['customer_id', 'title', 'description', 'cost'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function contract()
    {
        return $this->hasOne(Contract::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function($order){

        });

        static::created(function($order){

            // Create new contract
            $contract = new Contract();

            // Associate the new contract with the order
            $contract->customer_id = $order->customer_id;
            $contract->order_id = $order->id;
            $contract->save();

        });

        static::updating(function($item){

        });

        static::updated(function($item){
            
        });

        static::deleting(function($order){

            // Reset all relations
            $order->contract()->delete();
            $order->tags()->sync([]);
            
        });

        static::deleted(function($item){

        });
    }

}
