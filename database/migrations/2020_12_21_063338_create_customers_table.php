<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('photo')->nullable();
            $table->enum('gender', ['Male','Female'])->nullable();
            $table->date('dob')->nullable();
            $table->string('zip')->nullable();
            $table->string('residency')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('is_provider')->default(0)->nullable();
            $table->string('f_url')->nullable();
            $table->string('g_url')->nullable();
            $table->string('t_url')->nullable();
            $table->string('l_url')->nullable();
            $table->tinyInteger('f_check')->default(0)->nullable();
            $table->tinyInteger('t_check')->default(0)->nullable();
            $table->tinyInteger('l_check')->default(0)->nullable();
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
        Schema::dropIfExists('customers');
    }
}
