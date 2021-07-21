<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJissekiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jissekis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('crop')->nullable();
            $table->date('jisseki_date')->nullable();
            $table->string('jisseki_time')->nullable();
            $table->string('jisseki_weather')->nullable();
            $table->string('jisseki_people')->nullable();
            $table->text('jisseki_contents')->nullable();
            $table->text('jisseki_material')->nullable();
            $table->string('jisseki_suuryou')->nullable();
            $table->string('jisseki_syukkatanka')->nullable();
            $table->string('image_path')->nullable();
            $table->text('jisseki_coment')->nullable();
            $table->string('yotei_id')->nullable();
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
        Schema::dropIfExists('jissekis');
    }
}
