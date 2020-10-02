<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $guarded =[];



    public function orders(){
        return $this->hasMany(customer::class);
    }



}
