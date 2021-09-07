<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinationListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccination_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('CMND');
            $table->string('ten');
            $table->string('birthday');
            $table->string('diachi');
            $table->string('SDT');
            $table->string('tienxu');
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
        Schema::dropIfExists('vaccination_list');
    }
}
