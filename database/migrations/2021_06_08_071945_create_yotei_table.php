<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYoteiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yoteis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('crop');
            $table->date('work_date');
            $table->string('work_time');
            $table->string('work_people');
            $table->string('contents');
            $table->string('material');
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
        Schema::dropIfExists('yoteis');
    }
}
