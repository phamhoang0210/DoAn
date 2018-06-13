<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDatphong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblDatphong', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('FK_IDKhachhang');
            $table->integer('FK_IDLoaiphong');
            $table->date('dNgayden');
            $table->date('dNgaydi');
            $table->integer('iSoluongnguoi')->nullable();
            $table->integer('iSoluongphong')->nullable();
            $table->integer('iKieuphong')->nullable();
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
        Schema::dropIfExists('tblDatphong');
    }
}
