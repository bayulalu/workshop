<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->text('subject');

            // $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('user_id');
            
            // $table->foreign('user_id')->references('id')->on('users')
            // ->onDelete('cascade');
            $table->timestamps();

            $table->foreign('user_id')
      ->references('id')->on('users')
      ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forms');
    }
}
