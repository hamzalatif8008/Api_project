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
            $table->integer('user_id');
            $table->text('cart')->nullable();
            $table->string('method')->nullable();
            $table->string('shipping')->nullable();
            $table->string('pickup_location')->nullable();
            $table->string('totalQty')->nullable();
            $table->float('pay_amount')->nullable();
            $table->string('txnid')->nullable();
            $table->string('charge_id')->nullable();
            $table->string('order_number')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_name')->nullable();
            $table->string('customer_country')->nullable();
            $table->string('customer_phone')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('customer_city')->nullable();
            $table->string('province')->nullable();
            $table->string('customer_zip')->nullable();
            $table->string('shipping_name')->nullable();
            $table->string('shipping_country')->nullable();
            $table->string('shipping_email')->nullable();
            $table->string('shipping_phone')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_zip')->nullable();
            $table->text('order_note')->nullable();
            $table->string('coupon_code')->nullable();
            $table->string('coupon_discount')->nullable();
            $table->enum('status', ['pending','processing','completed','declined'])->default('pending')->nullable();
            $table->string('affilate_user')->nullable();
            $table->string('affilate_charge')->nullable();
            $table->string('currency_sign')->nullable();
            $table->double('currency_value')->nullable();
            $table->double('shipping_cost')->nullable();
            $table->integer('tax')->nullable();
            $table->tinyInteger('dp')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
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
