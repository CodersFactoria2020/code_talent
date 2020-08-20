<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListCandidates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');

            $table->string('lastname');

            $table->string('email')->unique();

            $table->string('phone_number');

            $table->foreignId('promotion_id')->default(1);

            $table->foreign("promotion_id")->references("id")->on("promotions") ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->integer('status')->default(0);

            $table->string('sololearn')->default('falta link');

            $table->string('codeacademy')->default('falta link');

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
        Schema::dropIfExists('candidates');
    }
}
