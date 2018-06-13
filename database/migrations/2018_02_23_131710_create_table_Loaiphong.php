<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLoaiphong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblLoaiphong', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sTenLP')->nullable();
            $table->string('sHinhanh')->nullable();
            $table->string('sMota')->nullable();
            $table->integer('iGiaphong')->nullable();
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
        Schema::dropIfExists('tblLoaiphong');
    }
}
