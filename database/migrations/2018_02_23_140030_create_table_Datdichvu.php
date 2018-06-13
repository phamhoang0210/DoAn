<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDatdichvu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblDatdichvu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('FK_IDKhachhang');
            $table->integer('FK_IDDichvu');
            $table->integer('iSoluong');
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
        Schema::dropIfExists('tblDatdichvu');
    }
}
