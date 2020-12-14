<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Model\Join;
use Illuminate\Http\Request;
use Midtrans\Snap;

class JoinController extends Controller
{
    public function JoinTournament()
    {
        $join = Join::find(1);
        $this->initPaymentGateway();
        $join_details = array(
            'order_id' => $join->code_order_id,
            'gross_amount' => $join->gross_amount,
        );
        $customer_details = array(
            'first_name'    => $join->approved_by,
            'email'         => $join->approved_by,
            'phone'         => $join->phone,
        );
        $expiry = array(
            'duration' => Join::EXPIRY,
        );
        $transaction_join = array(
            'transaction_details' => $join_details,
            'customer_details' => $customer_details,
            'expired' => $expiry,
        );
        try {
            $paymentUrl = Snap::createTransaction($transaction_join);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
