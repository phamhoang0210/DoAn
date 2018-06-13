<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDichvu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblDichvu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sTenDV')->nullable();
            $table->string('sHinhanh')->nullable();
            $table->integer('iDongia')->nullable();
            $table->string('sMota')->nullable();
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
        Schema::dropIfExists('tblDichvu');
    }
}
