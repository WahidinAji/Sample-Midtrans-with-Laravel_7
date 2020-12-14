<?php

namespace App\Http\Controllers;

use App\Model\Order;
use App\Model\Payment2;
use Exception;
use Illuminate\Http\Request;
use Midtrans\Snap;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::find(2);
        // \dd($order->_token);
        $this->initPaymentGateway();
        $order_details = array(
            'order_id' => $order->order_code,
            'gross_amount' => $order->price,
        );
        $customer_details = array(
            'first_name'    => $order->customer_name,
            'email'         => $order->customer_email,
            'phone'         => $order->customer_phone,
        );
        $enable_payments = Payment2::PAYMENT_CHANNELS;
        $transaction_order = array(
            'enabled_payments' => $enable_payments,
            'transaction_details' => $order_details,
            'customer_details' => $customer_details,
        );
        // $snapToken = Snap::getSnapToken($transaction_order);
        // $order->_token = $snapToken;
        // return \view('order', \compact('snapToken'));
        // $snapToken = Snap::createTransaction($transaction_order);
        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($transaction_order);
            // $paymentUrl = Snap::createTransaction($transaction_order)->redirect_url;
            // $paymentToken = Snap::createTransaction($transaction_order)->token;
            // \dd($paymentUrl);
            $order->_token = $paymentUrl->token;
            $order->redirect_url = $paymentUrl->redirect_url;
            $order->save();
            // \dd($order);
            // Redirect to Snap Payment Page
            return \redirect($paymentUrl->redirect_url);
            // return header('Location: ' . $paymentUrl->redirect_url);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
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
     * @param  \App\Model\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
