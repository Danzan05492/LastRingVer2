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
            $table->date('birthday')->nullable();
            $table->tinyInteger('gender');
            $table->integer('illness_id')->unsigned();
            $table->text("info")->nullable(); 
            $table->string("nick")->unique();            
            $table->integer('owner_id');
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
