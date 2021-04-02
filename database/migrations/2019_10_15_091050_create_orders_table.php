<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id') -> unsigned();
            $table->text('title');
            $table->text('description');
            $table->double('cost', 8, 2);
            $table->timestamps();
            $table->softDeletes();            
        });

        Schema::table('orders', function(Blueprint $table) {
            $table->foreign('customer_id')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('orders', function(Blueprint $table) {
        //     $table->dropForeign(['customer_id']);
        // });

        Schema::dropIfExists('orders');
    }
}
