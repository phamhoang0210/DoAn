<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTaikhoan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblTaikhoan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sTen')->nullable();
            $table->string('email')->unique();
            $table->string('matkhau');
            $table->string('FK_IDLoaitaikhoan');
            $table->rememberToken();
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
        Schema::dropIfExists('tblTaikhoan');
    }
}
