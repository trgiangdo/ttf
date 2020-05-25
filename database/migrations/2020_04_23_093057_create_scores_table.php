<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scores', function (Blueprint $table) {
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('exam_id')->references('id')->on('exams')->onDelete('cascade');
            $table->integer('listening_correct_answers');
            $table->integer('reading_correct_answers');
            $table->integer('final_score');
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
        Schema::dropIfExists('scores');
    }
}
