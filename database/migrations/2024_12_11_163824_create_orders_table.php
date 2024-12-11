<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buyer_id')->nullable();
            $table->string('buyer_ip')->nullable();
            $table->string('affiliate_id')->nullable();
            $table->string('invoice_no');
            $table->string('buyer_name');
            $table->string('buyer_pone');
            $table->string('buyer_email')->nullable();
            $table->string('buyer_address');
            $table->string('buyer_city')->nullable();
            $table->string('buyer_state')->nullable();
            $table->string('buyer_zipcode')->nullable();
            $table->integer('total_items');
            $table->double('sub_total');
            $table->double('discount_amount')->default(0);
            $table->double('total_vat')->comment('in percentage')->default(0);
            $table->double('grand_total');
            $table->string('payment_status')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
