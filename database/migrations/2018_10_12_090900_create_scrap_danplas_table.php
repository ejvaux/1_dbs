<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScrapDanplasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scrap_danplas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('barcode')->nullable();
            $table->string('code')->nullable();
            $table->integer('type_id')->nullable();
            $table->integer('location_id')->nullable();
            $table->integer('condition_id')->nullable();
            $table->integer('status_id')->nullable();
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
        Schema::dropIfExists('scrap_danplas');
    }
}
