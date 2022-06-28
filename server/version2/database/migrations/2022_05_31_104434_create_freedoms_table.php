<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreedomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freedoms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('condemned_id')->unsigned();
            $table->text('info')->nullable();            
            $table->string('slug')->unique();
            $table->dateTime('enddate', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('freedoms');
    }
}
