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
            $table->date('yotei_date');
            $table->string('yotei_time');
            $table->string('yotei_people');
            $table->string('yotei_contents');
            $table->string('yotei_material');
            $table->timestamp('updated_at')->useCurrent()->nullable();
            $table->timestamp('created_at')->useCurrent()->nullable();
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
