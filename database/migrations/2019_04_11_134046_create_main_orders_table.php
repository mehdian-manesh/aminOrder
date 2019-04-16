<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id');
            $table->string('social_network_type');
            $table->unsignedBigInteger('social_network_id');
            $table->dateTime('ad_date');
            $table->unsignedTinyInteger('off')->default(0);
            $table->unsignedInteger('final_price');
            $table->dateTime('payment_date')->nullable();
            $table->boolean('payment_confirmed')->default(false);
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
        Schema::dropIfExists('main_orders');
    }
}
