<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    
    public function Address() {
        return $this->hasOne(Address::class);
    }
    public function Users() {
        return $this->belongsTo(Users::class, 'users_id');
    }
    public function product() {
        return $this->belongsToMany('App\Product','orders_product', 'orders_id','products_id')
            ->withPivot('quantity');
    }
}
