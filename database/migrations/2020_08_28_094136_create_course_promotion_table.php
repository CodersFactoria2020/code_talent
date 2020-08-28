<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursePromotionTable extends Migration
{

    public function up()
    {
        Schema::create('course_promotion', function (Blueprint $table) {
            $table->id();
            $table->integer('course_id')->unsigned();
            //$table->foreign('course_id')->references('id')->on('courses');
            $table->integer('promotion_id')->unsigned();
            //$table->foreign('promotion_id')->references('id')->on('promotions');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('course_promotion');
    }
}
