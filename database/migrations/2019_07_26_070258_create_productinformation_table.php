<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductinformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productinformation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('price');
            $table->string('manuCity');
            $table->integer('pincode');
            $table->string('gstNo');
            $table->integer('mrp');
            $table->date('batchNo');
            $table->integer('weight');
            $table->integer('productId')->index('producId');
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
        Schema::dropIfExists('productinformation');
    }
}
