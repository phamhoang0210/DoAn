<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePhanhoi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblPhanhoi', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sTieude')->nullable();
            $table->string('sNoidung')->nullable();
            $table->integer('FK_IDKhachhang');
            $table->integer('FK_IDDichvu');
            $table->integer('FK_IDPhong');
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
        Schema::dropIfExists('tblPhanhoi');
    }
}
