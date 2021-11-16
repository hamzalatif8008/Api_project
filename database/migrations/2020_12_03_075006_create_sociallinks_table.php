<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSociallinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sociallinks', function (Blueprint $table) {
            $table->id();
            $table->string('facebook')->nullable();
            $table->string('gplus')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->tinyInteger('i_status')->default(1)->nullable();
            $table->tinyInteger('f_status')->default(1)->nullable();
            $table->tinyInteger('g_status')->default(1)->nullable();
            $table->tinyInteger('t_status')->default(1)->nullable();
            $table->tinyInteger('l_status')->default(1)->nullable();
            $table->tinyInteger('fcheck')->nullable();
            $table->tinyInteger('gcheck')->nullable();
            $table->text('fclient_id')->nullable();
            $table->text('fclient_secret')->nullable();
            $table->text('fredirect')->nullable();
            $table->text('gclient_id')->nullable();
            $table->text('gclient_secret')->nullable();
            $table->text('gredirect')->nullable();
            
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
        Schema::dropIfExists('sociallinks');
    }
}
