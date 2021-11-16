<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrenchiseNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frenchise_notifications', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('vendor_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->integer('conversation_id')->nullable();
            $table->tinyInteger('is_read')->default(0);
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
        Schema::dropIfExists('frenchise_notification');
    }
}
