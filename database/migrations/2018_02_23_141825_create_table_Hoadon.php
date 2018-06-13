<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHoadon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblHoadon', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('FK_IDDatphong');
            $table->integer('FK_IDDatdichvu')->nullable();
            $table->date('dNgayden')->nullable();
            $table->date('dNgaydi')->nullable();
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
        Schema::dropIfExists('tblHoadon');
    }
}
