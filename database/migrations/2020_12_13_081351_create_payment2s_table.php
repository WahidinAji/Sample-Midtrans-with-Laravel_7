<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayment2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment2s', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('gross_amount')->nullable();
            $table->string('transaction_status'); //settlement,pending,deny,expire,cancel
            $table->string('transaction_id')->nullable();
            $table->string('status_code');
            $table->string('status_message')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('signature_key')->nullable();
            $table->string('fraud_status')->nullable();
            $table->string('pdf_url')->nullable();
            $table->string('finish_redirect_url')->nullable();
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
        Schema::dropIfExists('payment2s');
    }
}
