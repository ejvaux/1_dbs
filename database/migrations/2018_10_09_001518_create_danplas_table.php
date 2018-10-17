<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDanplasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danplas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('barcode')->unique();
            $table->string('code')->unique();
            $table->integer('type_id');
            $table->integer('location_id')->nullable();
            $table->integer('condition_id');
            $table->integer('status_id');
            $table->integer('transaction_id')->nullable();
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
        Schema::dropIfExists('danplas');
    }
}
