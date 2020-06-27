<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('customer_name', 132);
            $table->string('customer_email');
            $table->text('address');
            $table->string('city', 32);
            $table->string('postal_code', 16);
            $table->double('total_amount', 10, 2);
            $table->double('discount_amount', 10, 2)->default(0);
            $table->double('paid_amount', 10, 2);
            $table->string('payment_status', 16)->default('pending');
            $table->text('payment_details')->nullable();
            $table->string('processed_status')->default('pending');
            $table->unsignedBigInteger('processed_by')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('processed_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
