<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelegramOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telegram_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('views');
            $table->unsignedBigInteger('telegram_plan_id');
            $table->unsignedBigInteger('telegram_channel_id');
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
        Schema::dropIfExists('telegram_orders');
    }
}
