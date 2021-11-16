<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('subscription_id');
            $table->text('title')->nullable();
            $table->string('currency')->nullable();
            $table->string('currency_code')->nullable();
            $table->double('price')->default(0)->nullable();
            $table->integer('days');
            $table->integer('allowed_products')->default(0)->nullable();
            $table->text('details')->nullable();
            $table->string('method')->default('free')->nullable();
            $table->string('txnid')->nullable();
            $table->string('charge_id')->nullable();
            $table->integer('status')->default(0)->nullable();

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
        Schema::dropIfExists('user_subscriptions');
    }
}
