<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerOrderTable extends Migration
{
    public function up()
    {
        Schema::create('customer_order', function(Blueprint $table) {
            $table->bigIncrements('id');

            $table -> bigInteger('customer_id') -> unsigned();
            $table -> bigInteger('order_id') -> unsigned();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customer_order');
    }
}
