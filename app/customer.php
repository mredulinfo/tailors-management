<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $guarded =[];
    public $fillable = [
        'name'
    ];



    public function orders(){
        return $this->hasMany(customer::class);
    }



}
