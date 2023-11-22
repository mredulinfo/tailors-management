<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
//    public $fillable = [
//        'date','cloth_code','customer_id', 'customer_name','mobile', 'product_name', 'cus_h','cus_n','cus_b','cus_w','process_by','remark','order_total','order_advance','order_due',
//    ];

    public function customer(){
        return $this->belongsTo(Customer::class); // Link back to the Customer model
    }


}


