<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionCandidateTable extends Migration
{

    public function up()
    {
        Schema::create('promotion_candidate', function (Blueprint $table) {

            $table->id();

            $table->foreignId('candidates_id');

            $table->foreignId('promotions_id');

            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('promotion_candidate');
    }
}
