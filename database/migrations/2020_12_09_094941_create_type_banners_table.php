<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_banners', function (Blueprint $table) {
            $table->increments('tb_id');
            $table->string('tb_image');
            $table->string('tb_image1');
            $table->string('tb_image2');
            $table->integer('tb_ct_id');
            $table->enum('tb_status', ['0','1']);
            $table->dateTime('tb_created');
            
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
        Schema::dropIfExists('type_banners');
    }
}
