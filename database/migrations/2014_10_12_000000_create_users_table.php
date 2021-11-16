<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('frenchise_id')->default(0)->nullable();
            $table->string('name')->nullable();
            $table->string('photo')->nullable();
            $table->enum('gender', ['Male','Female'])->nullable();
            $table->date('dob')->nullable();
            $table->string('zip')->nullable();
            $table->string('residency')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('is_provider')->default(0)->nullable();
            $table->string('shop_name')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('shop_number')->nullable();
            $table->string('shop_address')->nullable();
            $table->string('reg_number')->nullable();
            $table->text('shop_message')->nullable();
            $table->text('logo')->nullable();
            $table->string('gif')->nullable();
            $table->string('gif1')->nullable();
            $table->string('gif2')->nullable();
            $table->tinyInteger('is_vendor')->default(0)->nullable();
            $table->text('shop_details')->nullable();
            $table->string('f_url')->nullable();
            $table->string('g_url')->nullable();
            $table->string('t_url')->nullable();
            $table->string('i_url')->nullable();
            $table->string('l_url')->nullable();
            $table->tinyInteger('f_check')->default(0)->nullable();
            $table->tinyInteger('g_check')->default(0)->nullable();
            $table->tinyInteger('t_check')->default(0)->nullable();
            $table->tinyInteger('i_check')->default(0)->nullable();
            $table->tinyInteger('l_check')->default(0)->nullable();
            $table->integer('shipping_cost')->nullable();
            $table->integer('current_balance')->default(0)->nullable();
            $table->string('affilate_code')->nullable();
            $table->double('affilate_income')->default(0)->nullable();
            $table->date('date')->nullable();
            $table->tinyInteger('brand')->default(0)->nullable();
            $table->tinyInteger('top')->default(0)->nullable();
            $table->tinyInteger('top_by_category')->default(0)->nullable();
            $table->tinyInteger('nav_shop')->default(0)->nullable();
            $table->tinyInteger('top_rated')->default(0)->nullable();
            $table->tinyInteger('coming_shop')->default(0)->nullable();
            $table->tinyInteger('v_type')->default(0)->nullable();
            $table->tinyInteger('mail_sent')->default(0)->nullable();
            $table->integer('forgetpasswordcode')->nullable();
            $table->dateTime('codeexiperat')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
