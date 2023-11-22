<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{


    public function formats()
    {
        return $this->belongsToMany(Format::class);
    }

    public function customers() {
        return $this->belongsToMany(Customer::class, 'customer_measurements')
            ->withPivot('value');
    }



}
