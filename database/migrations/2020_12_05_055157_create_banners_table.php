<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('top1')->nullable();
            $table->string('top2')->nullable();
            $table->string('top3')->nullable();
            $table->string('top4')->nullable();
            $table->string('top5')->nullable();
            $table->string('bottom1')->nullable();
            $table->string('bottom2')->nullable();
            $table->string('top1l')->nullable();
            $table->string('top2l')->nullable();
            $table->string('top3l')->nullable();
            $table->string('top4l')->nullable();
            $table->string('top5l')->nullable();
            $table->string('bottom1l')->nullable();
            $table->string('bottom2l')->nullable();
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
        Schema::dropIfExists('banners');
    }
}
