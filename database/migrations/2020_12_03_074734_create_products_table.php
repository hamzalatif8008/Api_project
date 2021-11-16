<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->integer('childcategory_id')->nullable();
            $table->integer('user_id')->default(0);
            $table->text('name')->nullable();
            $table->string('photo')->nullable();
            $table->string('size')->nullable();
            $table->text('color')->nullable();
            $table->float('cprice')->nullable();
            $table->float('pprice')->nullable();
            $table->text('description')->nullable();
            $table->integer('stock')->nullable();
            $table->text('policy')->nullable();
            $table->tinyInteger('status')->default(1)->nullable();
            $table->integer('views')->default(0)->nullable();
            $table->string('tags')->nullable();
            $table->tinyInteger('featured')->default(0)->nullable();
            $table->tinyInteger('best')->default(0)->nullable();
            $table->tinyInteger('top')->default(0)->nullable();
            $table->tinyInteger('hot')->default(0)->nullable();
            $table->tinyInteger('latest')->default(0)->nullable();
            $table->tinyInteger('big')->default(0)->nullable();
            $table->tinyInteger('deal_of_the_day')->default(0)->nullable();
            $table->tinyInteger('festival')->default(0)->nullable();
            $table->tinyInteger('shop_status')->default(0)->nullable();
            $table->text('features')->nullable();
            $table->text('colors')->nullable();
            $table->tinyInteger('product_condition')->default(0)->nullable();
            $table->string('ship')->nullable();
            $table->tinyInteger('is_meta')->default(0)->nullable();
            $table->text('meta_tag')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('youtube')->nullable();
            $table->tinyInteger('type')->default(0)->nullable();
            $table->string('file')->nullable();
            $table->text('license')->nullable();
            $table->text('license_qty')->nullable();
            $table->text('link')->nullable();
            $table->string('platform')->nullable();
            $table->string('region')->nullable();
            $table->string('licence_type')->nullable();
            $table->string('measure')->nullable();
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
        Schema::dropIfExists('products');
    }
}
