<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentWebhooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_webhooks', function (Blueprint $table) {
            $table->id();
            $table->string('order_id'); //   "order_id": "Postman-1578568851",
            $table->string('transaction_id'); //   "transaction_id": "57d5293c-e65f-4a29-95e4-5959c3fa335b",
            $table->string('transaction_status'); //   "transaction_status": "capture",
            $table->string('transaction_time'); //   "transaction_time": "2020-01-09 18:27:19",
            $table->string('status_message'); //   "status_message": "midtrans payment notification",
            $table->string('status_code'); //   "status_code": "200",
            $table->string('gross_amount'); //   "gross_amount": "10000.00",
            $table->string('payment_type'); //   "payment_type": "credit_card",
            $table->string('fraud_status')->nullable(); //   "fraud_status": "accept",
            $table->string('signature_key')->nullable(); //   "signature_key": "16d6f84b2fb0468e2a9cf99a8ac4e5d803d42180347aaa70cb2a7abb13b5c6130458ca9c71956a962c0827637cd3bc7d40b21a8ae9fab12c7c3efe351b18d00a",
            $table->string('merchant_id')->nullable(); //   "merchant_id": "M004123",
            $table->string('masked_card')->nullable(); //   "masked_card": "481111-1114",
            $table->string('eci')->nullable(); //   "eci": "05",
            $table->string('currency')->nullable(); //   "currency": "IDR",
            $table->string('channel_response_message')->nullable(); //   "channel_response_message": "Approved",
            $table->string('channel_response_code')->nullable(); //   "channel_response_code": "00",
            $table->string('card_type')->nullable(); //   "card_type": "credit",
            $table->string('bank')->nullable(); //   "bank": "bni",
            $table->string('approval_code')->nullable(); //   "approval_code": "1578569243927"
            $table->string('permata_va_number')->nullable(); //   "permata_va_number": "8562000087926752",
            //virtual account
            //bca va
            // "va_numbers": [
            //     {
            //       "bank": "bca",
            //       "va_number": "91019021579"
            //     }
            //   ],
            $table->string('va_bank')->nullable();
            $table->string('va_number')->nullable();
            //bni va
            //   "payment_amounts": [
            //     {
            //       "paid_at": "2016-06-19 20:12:22",
            //       "amount": "20000.00"
            //     }
            //   ],
            $table->string('bni_pa_paid_at')->nullable(); //pa => payment_amounts
            $table->string('bni_pa_amount')->nullable(); //pa => payment_amounts
            //mandiri bill
            //   "bill_key": "990000000260",
            //   "biller_code": "70012"
            $table->string('mandiri_bill_key')->nullable();
            $table->string('mandiri_biller_code')->nullable();
            //indomart
            $table->string('payment_code')->nullable(); //   "payment_code": "25709650945026",
            $table->string('store')->nullable(); //   "store": "indomaret"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_webhooks');
    }
}
