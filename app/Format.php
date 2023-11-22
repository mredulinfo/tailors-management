<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Format extends Model
{


    public function measurements()
    {
        return $this->belongsToMany(Measurement::class);
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }


}
