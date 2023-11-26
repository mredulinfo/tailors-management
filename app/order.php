<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
//    public $fillable = [
//        'date','cloth_code','customer_id', 'customer_name','mobile', 'product_name', 'cus_h','cus_n','cus_b','cus_w','process_by','remark','order_total','order_advance','order_due',
//    ];

    protected $fillable = [
        'date', 'cloth_code', 'customer_id', 'customer_name', 'customer_address',
        'customer_mobile',  'order_total', 'order_advance',
        'order_due', 'order_processed_by', 'remark'
    ];

    public function customer(){
        return $this->belongsTo(Customer::class); // Link back to the Customer model
    }

    public function items() {
        return $this->belongsToMany(Item::class, 'order_items');
    }

}


