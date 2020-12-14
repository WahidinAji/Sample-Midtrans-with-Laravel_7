<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public $timestamps = \true;
    public const PAID = 'paid';
    public const UNPAID = 'unpaid';
}
