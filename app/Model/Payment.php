<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['order_id', 'gross_amount', 'item_id', 'item_name', 'customer_name', 'customer_email', 'customer_phone'];
    public $timestamps = \true;
}
