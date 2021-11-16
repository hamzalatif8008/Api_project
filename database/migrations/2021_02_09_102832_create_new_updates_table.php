<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_updates', function (Blueprint $table) {
            $table->id();
            $table->string('mainslider')->nullable();
            $table->string('mainslider1')->nullable();
            $table->string('mainslider2')->nullable();
            $table->string('sidebanner')->nullable();
            $table->string('sidebanner1')->nullable();
            $table->string('sidebanner2')->nullable();
            $table->string('videobanner1')->nullable();
            $table->string('video1')->nullable();
            $table->string('videobanner2')->nullable();
            $table->string('video2')->nullable();
            $table->string('videobanner3')->nullable();
            $table->string('video3')->nullable();
            $table->string('video')->nullable();
            $table->string('tag')->nullable();

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
        Schema::dropIfExists('new_updates');
    }
}
