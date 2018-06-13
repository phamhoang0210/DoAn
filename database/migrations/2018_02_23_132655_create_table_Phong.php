<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePhong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblPhong', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sTenP')->nullable();
            $table->integer('iKieuphong')->nullable();
            $table->integer('iTrangthai')->nullable();
            $table->integer('FK_IDLoaiphong');
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
        Schema::dropIfExists('tblPhong');
    }
}
