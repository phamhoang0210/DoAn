<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabbleTintuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblTintuc', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('FK_IDUsers')->nullable();
            $table->string('sTieude')->nullable();
            $table->string('sTomtat')->nullable();
            $table->string('sNoidung')->nullable();
            $table->string('sHinhanh')->nullable();
            $table->integer('iNoibat')->nullable();
            $table->integer('iSoluotxem')->nullable();
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
        Schema::dropIfExists('tblTintuc');
    }
}
