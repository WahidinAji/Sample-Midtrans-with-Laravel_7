<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['order_id', 'gross_ammount', 'item_id', 'item_price', 'item_name', 'customer_name', 'customer_email', 'customer_phone'];
    public $timestamps = \true;
}
