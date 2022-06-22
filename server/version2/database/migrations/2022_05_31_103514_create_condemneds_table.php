<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondemnedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condemneds', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("family");
            $table->string("name");
            $table->string("patronymic");
            $table->tinyInteger('age');
            $table->tinyInteger('gender');
            $table->integer('illness_id')->unsigned();
            $table->text("info")->nullable(); 
            $table->string("nick")->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('condemneds');
    }
}
