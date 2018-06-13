<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKhachhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblKhachhang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sTenKH')->nullale();
            $table->date('dNgaysinh')->nullale();
            $table->string('sQuoctich')->nullale();
            $table->string('sGioitinh')->nullale();
            $table->string('sDinhdanh')->nullale();
            $table->string('sSDT')->nullale();
            $table->string('sDiachi')->nullale();
            $table->integer('FK_IDUsers')->nullale();
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
        Schema::dropIfExists('tblKhachhang');
    }
}
