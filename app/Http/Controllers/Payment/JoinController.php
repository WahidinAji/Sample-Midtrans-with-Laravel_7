<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Model\Join;
use App\Model\Payment2;
use App\Model\PaymentMidtrans;
use Exception;
use Illuminate\Http\Request;
use Midtrans\Snap;

class JoinController extends Controller
{
    public function JoinTournament()
    {
        // \dd('ini siapa');
        $join = Join::find(3);
        $this->initPaymentGateway();
        $customerDetails = [
            'first_name'    => $join->approved_by,
            // 'email'         => $join->approved_by,
            'email'         => 'test@mail.com',
            'phone'         => $join->phone,
        ];

        $params = [
            'enable_payments' => PaymentMidtrans::PAYMENT_CHANNELS,
            'transaction_details' => [
                'order_id' => $join->code_order_id,
                'gross_amount' => $join->gross_amount,
            ],
            'customer_details' => $customerDetails,
            'expiry' => [
                "unit" => "days",
                'duration' => Join::EXPIRY,
            ],
        ];
        // \dd($params);
        try {
            $response_midtrans = Snap::createTransaction($params);
            $join->_token = $response_midtrans->token;
            $join->redirect_url = $response_midtrans->redirect_url;
            $join->save();
            return \redirect($response_midtrans->redirect_url);
        } catch (Exception $e) {
            // echo $e->getMessage();

            $message = $e->getMessage();
            return \redirect()->back()->with($message);
        }
    }
}
