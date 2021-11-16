<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagesettings', function (Blueprint $table) {
            $table->id();
            $table->string('contact_success')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_title')->nullable();
            $table->text('contact_text')->nullable();
            $table->text('about')->nullable();
            $table->text('faq')->nullable();
            $table->string('bn')->nullable();
            $table->string('bnimg')->nullable();
            $table->tinyInteger('c_status')->default(0);
            $table->tinyInteger('a_status')->default(0);
            $table->tinyInteger('f_status')->default(0);
            $table->tinyInteger('is_currency')->default(1);
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
        Schema::dropIfExists('pagesettings');
    }
}
