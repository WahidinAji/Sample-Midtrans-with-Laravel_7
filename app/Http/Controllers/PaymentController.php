<?php

namespace App\Http\Controllers;

use App\Model\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \view('welcome');
    }
    public function Pay()
    {
        $paymentCustomer = DB::table('payments')->first();
        // \dd($paymentCustomer);
        $this->initPaymentGateway();
        $params = array(
            'transaction_details' => array(
                'order_id' => rand() . $paymentCustomer->item_id . $paymentCustomer->order_id . $paymentCustomer->gross_amount,
                'gross_amount' => $paymentCustomer->gross_amount,
            ),
            'customer_details' => array(
                'first_name' => $paymentCustomer->customer_name,
                'email' => $paymentCustomer->customer_email,
                'phone' => $paymentCustomer->customer_phone,
            ),
        );
        // \dd($params);

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // \dd($snapToken);
        // return \response()->json()
        return \view('welcome', \compact('snapToken'));
        // return \redirect()->back();
    }
    public function finish($id)
    {
        $paymentCustomer = Payment::find($id)
        
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
     * @param  \App\Model\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
