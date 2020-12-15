<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PaymentMidtrans extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];
    public $timestamps = \true;

    public const CHALLENGE = 'challenge';
    public const SUCCESS = 'success';
    public const SETTLEMENT = 'settlement';
    public const PENDING = 'pending';
    public const DENY = 'deny';
    public const EXPIRE = 'expire';
    public const CANCEL = 'cancel';
    public const PAYMENT_CHANNELS = [
        'credit_card', 'mandiri_clickpay', 'cimb_clicks',
        'bca_klikbca', 'bca_klikpay', 'bri_epay', 'echannel', 'permata_va',
        'bca_va', 'bni_va', 'other_va', 'gopay', 'indomaret',
        'danamon_online', 'akulaku'
    ];
}
