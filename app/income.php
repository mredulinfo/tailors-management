<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class income extends Model
{
    public function total(){
        return $this->hasMany(order::class);
    }
}

