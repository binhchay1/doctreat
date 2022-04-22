<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStorageHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storage_history', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('last_quantity');
            $table->integer('add_quantity');
            $table->string('invoice');
            $table->string('note')->nullable();
            $table->string('employee');
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
        Schema::dropIfExists('storage_history');
    }
}
