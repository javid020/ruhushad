<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMollasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mollas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->string('phone')->unique();
            $table->string('extra_phone')->nullable();
            $table->string('avatar')->nullable();
            $table->text('about');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->dateTime('birth_date')->nullable();
            $table->unsignedInteger('belief_id');
            //$table->tinyInteger('verified')->default(0);
            $table->boolean('verified')->default(false);

            $table->unsignedTinyInteger('experience')->nullable();
            $table->softDeletes();

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
        Schema::dropIfExists('mollas');
    }
}
