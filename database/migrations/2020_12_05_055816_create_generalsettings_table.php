<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralsettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('generalsettings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->string('gif')->nullable();
            $table->string('favicon')->nullable();
            $table->string('title')->nullable();
            $table->string('site')->nullable();
            $table->string('bgimg')->nullable();
            $table->string('cimg')->nullable();
            $table->text('about')->nullable();
            $table->text('street')->nullable();
            $table->text('phone')->nullable();
            $table->text('fax')->nullable();
            $table->text('email')->nullable();
            $table->text('footer')->nullable();
            $table->string('bg_title')->nullable();
            $table->string('bg_link')->nullable();
            $table->string('bg_text')->nullable();
            $table->integer('np')->default(0);
            $table->integer('fp')->default(0);
            $table->string('pb')->nullable();
            $table->string('sk')->nullable();
            $table->string('ss')->nullable();
            $table->tinyInteger('pcheck')->default(1);
            $table->tinyInteger('scheck')->default(1);
            $table->tinyInteger('mcheck')->default(1);
            $table->tinyInteger('bcheck')->default(1);
            $table->tinyInteger('ccheck')->default(1);
            $table->text('mmi')->nullable();
            $table->text('bi')->nullable();
            $table->integer('ship')->default(0);
            $table->string('vid')->nullable();
            $table->string('vidimg')->nullable();
            $table->string('tags')->nullable();
            $table->tinyInteger('sign')->default(0);
            $table->tinyInteger('slider')->default(1);
            $table->tinyInteger('category')->default(1);
            $table->tinyInteger('sb')->default(1);
            $table->tinyInteger('hv')->default(1);
            $table->tinyInteger('ftp')->default(1);
            $table->tinyInteger('lp')->default(1);
            $table->tinyInteger('pp')->default(1);
            $table->tinyInteger('lb')->default(1);
            $table->tinyInteger('bs')->default(1);
            $table->tinyInteger('ts')->default(1);
            $table->tinyInteger('bl')->default(1);
            $table->string('colors')->nullable();
            $table->string('bimg')->nullable();
            $table->string('loader')->nullable();
            $table->string('count_title')->nullable();
            $table->string('count_heading')->nullable();
            $table->string('count_date')->nullable();
            $table->string('count_link')->nullable();
            $table->string('count_image')->nullable();
            $table->string('fes_title')->nullable();
            $table->string('fes_detail')->nullable();
            $table->tinyInteger('service_section')->default(0);
            $table->text('order_title')->nullable();
            $table->text('order_text')->nullable();
            $table->string('cart_success')->nullable();
            $table->string('cart_error')->nullable();
            $table->string('wish_success')->nullable();
            $table->string('wish_error')->nullable();
            $table->string('wish_remove')->nullable();
            $table->string('compare_success')->nullable();
            $table->string('compare_error')->nullable();
            $table->string('compare_remove')->nullable();
            $table->string('invalid')->nullable();
            $table->string('color_change')->nullable();
            $table->string('size_change')->nullable();
            $table->string('coupon_found')->nullable();
            $table->string('no_coupon')->nullable();
            $table->string('coupon_already')->nullable();
            $table->integer('withdraw_charge')->default(0);
            $table->integer('withdraw_fee')->default(0);
            $table->integer('frenchise_commision')->default(0);
            $table->integer('partner_commision')->default(0);
            $table->integer('fixed_commission')->default(0);
            $table->integer('percentage_commission')->default(0);
            $table->integer('tax')->nullable();
            $table->integer('multiple_ship')->nullable(0);
            $table->tinyInteger('is_talkto')->default(1);
            $table->text('talkto')->nullable();
            $table->string('subscribe_title')->nullable();
            $table->text('subscribe_text')->nullable();
            $table->string('subscribe_image')->nullable();
            $table->tinyInteger('is_subscribe')->default(1);
            $table->tinyInteger('is_language')->default(1);
            $table->tinyInteger('reg_vendor')->default(1);
            $table->tinyInteger('rtl')->default(0);
            $table->tinyInteger('is_affilate')->default(0);
            $table->integer('affilate_charge')->default(0);
            $table->tinyInteger('guest_checkout')->default(0);
            $table->string('affilate_banner')->nullable();
            $table->string('smtp_host')->nullable();
            $table->string('smtp_port')->nullable();
            $table->string('smtp_user')->nullable();
            $table->string('smtp_pass')->nullable();
            $table->string('from_email')->nullable();
            $table->string('from_name')->nullable();
            $table->tinyInteger('ship_info')->default(0);
            $table->tinyInteger('is_smtp')->default(0);
            $table->tinyInteger('is_comment')->default(0);
            $table->text('footer_background')->nullable();
            $table->tinyInteger('is_loader')->default(1);
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
        Schema::dropIfExists('generalsettings');
    }
}
