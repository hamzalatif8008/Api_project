<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrenchisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frenchises', function (Blueprint $table) {
            $table->id();
            $table->string('province')->nullable();
            $table->string('photo')->nullable();
            $table->string('reg_number')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('cnic')->nullable();
            $table->string('frenchise_address')->nullable();
            $table->string('religion')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('home_address')->nullable();
            $table->string('bank_account_1')->nullable();
            $table->string('bank_account_2')->nullable();
            $table->string('mobile_number')->nullable(); 
            $table->string('mobile_number_1')->nullable(); 
            $table->string('submit_amount')->nullable();  
            $table->string('remaining_amount')->nullable(); 
            $table->string('duration')->nullable(); 
            $table->string('partner')->nullable(); 
            $table->string('percentage')->nullable(); 
            $table->string('monthly_percentage')->nullable(); 
            $table->string('yearly_percentage')->nullable(); 
            $table->string('completion_percentage')->nullable(); 
            $table->string('vitnes')->nullable(); 
            $table->string('father_vitnes')->nullable(); 
            $table->string('cnic_vitnes')->nullable(); 
            $table->string('vitnes_address')->nullable(); 
            $table->string('vitnes_mobile')->nullable(); 
            $table->string('vitnes_mobile_1')->nullable(); 
            $table->string('frenchise_name')->nullable();
            $table->string('frenchise_mobile_number')->nullable();
            $table->string('vendor_limit')->default(100)->nullable();
            $table->string('email')->unique();
            $table->string('password'); 
            $table->text('area')->nullable();
            $table->text('frenchise_message')->nullable(); 
            $table->text('frenchise_detail')->nullable();
            $table->enum('gender', ['Male','Female'])->nullable();
            $table->date('dob')->nullable();
            $table->string('zip')->nullable();
            $table->string('residency')->nullable();
            $table->string('phone1')->nullable(); 
            $table->timestamp('email_verified_at')->nullable();
            $table->string('f_url')->nullable();
            $table->string('g_url')->nullable();
            $table->string('t_url')->nullable();
            $table->string('i_url')->nullable();
            $table->string('l_url')->nullable();
            $table->tinyInteger('f_check')->default(0)->nullable();
            $table->tinyInteger('g_check')->default(0)->nullable();
            $table->tinyInteger('t_check')->default(0)->nullable();
            $table->tinyInteger('l_check')->default(0)->nullable();
            $table->tinyInteger('i_check')->default(0)->nullable();
            $table->integer('shipping_cost')->nullable();
            $table->integer('current_balance')->default(0)->nullable();
            $table->string('affilate_code')->nullable();
            $table->double('affilate_income')->default(0)->nullable();
            $table->date('date')->nullable();
            $table->tinyInteger('mail_sent')->default(0)->nullable();
            $table->tinyInteger('status')->default(0)->nullable();
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
        Schema::dropIfExists('frenchises');
    }
}
