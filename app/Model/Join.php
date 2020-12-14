<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Join extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public $timestamps = \true;
    public const JOINCODE = 'JOIN-' . \uniqid();
    public const SUCCESS = 1;
    public const EXPIRY = 1;
}
