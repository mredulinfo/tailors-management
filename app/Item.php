<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{


    public function format()
    {
        return $this->belongsTo(Format::class);
    }



}
