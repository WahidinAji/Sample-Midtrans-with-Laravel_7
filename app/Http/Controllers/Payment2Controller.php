<?php

namespace App\Http\Controllers;

use App\Model\Order;
use App\Model\Payment2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Midtrans\Notification;

class Payment2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function notification(Request $request)
    {
        $payload = $request->getContent();
        $notification = \json_decode($payload);
        $validSignatureKey = hash("sha512", $notification->order_id . $notification->status_code . $notification->gross_amount . env('MIDTRANS_SERVER_KEY'));
        // \dd($validSignatureKey, $notification->signature_key);
        if ($notification->signature_key != $validSignatureKey) {
            return response(['message' => 'Invalid signature'], 403);
        }
        // \dd($validSignatureKey);
        // $pay = Payment2::create([
        //     'order_id' => $notification->order_id,
        //     'gross_amount' => $notification->gross_amount,
        //     'transaction_status' => $notification->transaction_status,
        //     'transaction_id' => $notification->transaction_id,
        //     'status_code' => $notification->status_code,
        //     'status_message' => $notification->status_message,
        //     'payment_type' => $notification->payment_type,
        //     'signature_key' => $notification->signature_key,
        //     'fraud_status' => $notification->fraud_status,
        // ]);
        // \dd($pay);
        $this->initPaymentGateway();
        $notif = new Notification();
        // $notif = \json_decode($payload);
        // $validSignatureKey = \hash('sha512', $notif->order_id . $notif->status_code . $notif->gross_amount . \env('MIDTRANS_SERVERKEY'));
        // if ($notif->signature_key != $validSignatureKey) {
        //     return \response(['message' => 'Invalid signature'], 403);
        // }

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;
        $order = Order::where('order_code', $order_id)->first();
        $paymentStatus = null;
        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    // echo "Transaction order_id: " . $order_id . " is challenged by FDS";
                    // $paymentStatus= "Transaction order_id: " . $order_id . " is challenged by FDS";
                    $order->payment_status = 'challenge';
                    $order->save();
                    // $paymentStatus = Payment2::CHALLENGE;
                } else {
                    // TODO set payment status in merchant's database to 'Success'
                    // echo "Transaction order_id: " . $order_id . " successfully captured using " . $type;
                    // $paymentStatus = Payment2::SUCCESS;
                    $order->payment_status = 'success';
                    $order->save();
                }
            }
        } else if ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            // echo "Transaction order_id: " . $order_id . " successfully transfered using " . $type;
            // $paymentStatus = Payment2::SETTLEMENT;
            $order->payment_status = 'settlement';
            $order->save();
        } else if ($transaction == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            // echo "Waiting customer to finish transaction order_id: " . $order_id . " using " . $type;
            // $paymentStatus = Payment2::PENDING;
            $order->payment_status = 'pending';
            $order->save();
        } else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            // echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is denied.";
            // $paymentStatus = Payment2::DENY;
            $order->payment_status = 'deny';
            $order->save();
        } else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            // echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is expired.";
            // $paymentStatus = Payment2::EXPIRE;
            $order->payment_status = 'expire';
            $order->save();
        } else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            // $paymentStatus = Payment2::CANCEL;
            $order->payment_status = 'cancel';
            $order->save();
        }
        Payment2::create([
            'order_id' => $order->id,
            'gross_amount' => $notif->gross_amount,
            'transaction_status' => $paymentStatus,
            'transaction_id' => $notif->transaction_id,
            'status_code' => $notif->status_code,
            'status_message' => $notif->status_message,
            'payment_type' => $notif->payment_type,
            'signature_key' => $notif->signature_key,
            'fraud_status' => $notif->fraud_status,
        ]);
        // if ($paymentStatus && $payment) {
        //     DB::transaction(
        //         function () use ($order, $payment) {
        //             if (\in_array($payment->transaction_status, [Payment2::SUCCESS, Payment2::SETTLEMENT])) {
        //                 $order->payment_status = Order::PAID;
        //                 $order->save();
        //             }
        //         }
        //     );
        // }
        $message = 'Payment status is : ' . $paymentStatus;
        $response = [
            'code' => 200,
            'message' => $message,
        ];
        return \response($response, 200);
    }
    public function finish(Request $request)
    {
        // $this
        $payload = $request->all();
        // \dd($request->all());
        // $json = \json_decode($payload);
        // Payment2::create([
        //     ''
        // ]);

        // \dd($request->all());
        return \view('finish');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Payment2  $payment2
     * @return \Illuminate\Http\Response
     */
    public function show(Payment2 $payment2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Payment2  $payment2
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment2 $payment2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Payment2  $payment2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment2 $payment2)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Payment2  $payment2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment2 $payment2)
    {
        //
    }
}
