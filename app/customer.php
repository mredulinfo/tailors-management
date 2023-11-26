<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // If you use guarded with an empty array, you don't need to use fillable.
    // This line means all attributes are mass assignable.
    protected $guarded = [];
    protected $fillable = ['name', 'address', 'mobile'];

    // Define the relationship with the Order model
    public function orders(){
        return $this->hasMany(Order::class); // Assuming the related model is 'Order'
    }
    public function measurements() {
        return $this->belongsToMany(Measurement::class, 'customer_measurements')
            ->withPivot('value');
    }


}
