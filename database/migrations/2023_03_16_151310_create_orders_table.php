<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->float('total_price', 7, 2)->nullable(false);
            $table->datetime('date')->nullable(false);
            $table->string('costumer_name', 40)->nullable(false);
            $table->string('costumer_phone', 15)->nullable(false);
            $table->string('costumer_mail', 100)->nullable(false);
            $table->string('costumer_address', 200)->nullable(false);
            $table->string('status', 20)->nullable(false);
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
        Schema::dropIfExists('orders');
    }
};
