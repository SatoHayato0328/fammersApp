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
            $table->string('yotei_time')->nullable();
            $table->string('yotei_people')->nullable();
            $table->text('yotei_contents')->nullable();
            $table->text('yotei_material')->nullable();
            $table->string('jisseki_id');
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
