<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {

            $table->id();

            $table->string('name');

            $table->foreignId('course_id')->default(1);

            //$table->foreign('course_id')->references('id')->on('courses')
                //->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
